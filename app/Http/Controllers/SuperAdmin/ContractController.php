<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Contract::query();

        if ($request->has('service_type') && $request->service_type != '') {
            $query->where('service_type', $request->service_type);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $contracts = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('superadmin.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::orderBy('name')->get();

        return view('superadmin.contracts.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'customer_id' => 'nullable|exists:customers,id',
            'service_type' => 'required|in:website,publication,branding,social_media',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'domain_name' => 'nullable|string|max:255',
            'domain_purchase_date' => 'nullable|date',
            'hosting_provider' => 'nullable|string|max:255',
            'hosting_start_date' => 'nullable|date',
            'contract_value' => 'nullable|numeric|min:0',
            'status' => 'required|in:pending,active,completed,cancelled',
            'description' => 'nullable|string',
            'technical_requirements' => 'nullable|string',
            'features' => 'nullable|string',
            'has_client_resources' => 'boolean',
            'client_resource_details' => 'nullable|string',
            'contract_code' => 'nullable|string|max:255',
            'representative_name' => 'nullable|string|max:255',
            'representative_title' => 'nullable|string|max:255',
            'client_address' => 'nullable|string|max:255',
            'tax_code' => 'nullable|string|max:255',
            'client_phone' => 'nullable|string|max:255',
            'attachment_files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $validated['has_client_resources'] = $request->boolean('has_client_resources');

        if ($request->input('action') === 'approve') {
            $validated['status'] = 'active';
        }

        // Handle attachments
        $attachments = [];
        if ($request->hasFile('attachment_files')) {
            foreach ($request->file('attachment_files') as $file) {
                $path = $file->store('contracts', 'public');
                $attachments[] = $path;
            }
        }
        $validated['attachments'] = $attachments;

        Contract::create($validated);

        return redirect()->route('superadmin.contracts.index')->with('success', 'Hợp đồng đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return view('superadmin.contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $customers = Customer::orderBy('name')->get();

        return view('superadmin.contracts.edit', compact('contract', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'customer_id' => 'nullable|exists:customers,id',
            'service_type' => 'required|in:website,publication,branding,social_media',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'domain_name' => 'nullable|string|max:255',
            'domain_purchase_date' => 'nullable|date',
            'hosting_provider' => 'nullable|string|max:255',
            'hosting_start_date' => 'nullable|date',
            'contract_value' => 'nullable|numeric|min:0',
            'status' => 'required|in:pending,active,completed,cancelled',
            'description' => 'nullable|string',
            'technical_requirements' => 'nullable|string',
            'features' => 'nullable|string',
            'has_client_resources' => 'boolean',
            'client_resource_details' => 'nullable|string',
            'contract_code' => 'nullable|string|max:255',
            'representative_name' => 'nullable|string|max:255',
            'representative_title' => 'nullable|string|max:255',
            'client_address' => 'nullable|string|max:255',
            'tax_code' => 'nullable|string|max:255',
            'client_phone' => 'nullable|string|max:255',
            'attachment_files.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $validated['has_client_resources'] = $request->boolean('has_client_resources');

        if ($request->input('action') === 'approve') {
            $validated['status'] = 'active';
        }

        $attachments = $contract->attachments ?? [];

        // Remove old attachments if requested
        if ($request->has('remove_attachments')) {
            foreach ($request->remove_attachments as $removePath) {
                if (($key = array_search($removePath, $attachments)) !== false) {
                    unset($attachments[$key]);
                    Storage::disk('public')->delete($removePath);
                }
            }
            $attachments = array_values($attachments); // re-index
        }

        // Add new attachments
        if ($request->hasFile('attachment_files')) {
            foreach ($request->file('attachment_files') as $file) {
                $path = $file->store('contracts', 'public');
                $attachments[] = $path;
            }
        }
        $validated['attachments'] = $attachments;

        $contract->update($validated);

        return redirect()->route('superadmin.contracts.index')->with('success', 'Cập nhật hợp đồng thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        // Delete physical files
        if ($contract->attachments) {
            foreach ($contract->attachments as $path) {
                Storage::disk('public')->delete($path);
            }
        }

        $contract->delete();

        return redirect()->route('superadmin.contracts.index')->with('success', 'Xóa hợp đồng thành công.');
    }

    public function exportDocument(Contract $contract, $type)
    {
        $templateDir = public_path();

        $filesMap = [
            'hdnt' => '0x0x.2026_HĐNT_AIM-CÔNG TY KH.docx',
            'bbnt' => '[MẪU] 0x0x.2026_BBNT_AIM-CÔNG TY KH.docx',
            'dntt' => '[MẪU] 0x0x.2026_DNTT_AIM-CÔNG TY KH.docx',
            'hddvtk' => '[MẪU] 0x0x.2026_HDDVTK_AIM-CÔNG TY KH.docx',
        ];

        if (! array_key_exists($type, $filesMap)) {
            return back()->with('error', 'Loại tài liệu không hợp lệ.');
        }

        $filename = $filesMap[$type];
        $templatePath = $templateDir.DIRECTORY_SEPARATOR.$filename;

        if (! file_exists($templatePath)) {
            return back()->with('error', 'Không tìm thấy file mẫu.');
        }

        $contractCode = $contract->contract_code ?? str_pad($contract->id, 4, '0', STR_PAD_LEFT).'.'.date('Y');

        $templateProcessor = new TemplateProcessor($templatePath);

        // Replace placeholders
        $templateProcessor->setValue('client_name', $contract->client_name ?? '...............');
        $templateProcessor->setValue('representative_name', $contract->representative_name ?? '...............');
        $templateProcessor->setValue('representative_title', $contract->representative_title ?? '...............');
        $templateProcessor->setValue('client_address', $contract->client_address ?? '...............');
        $templateProcessor->setValue('tax_code', $contract->tax_code ?? '...............');
        $templateProcessor->setValue('client_phone', $contract->client_phone ?? '...............');
        $templateProcessor->setValue('contract_code', $contractCode);
        $templateProcessor->setValue('contract_value', number_format($contract->contract_value ?? 0).' VNĐ');
        $templateProcessor->setValue('date', date('d/m/Y'));
        $templateProcessor->setValue('day', date('d'));
        $templateProcessor->setValue('month', date('m'));
        $templateProcessor->setValue('year', date('Y'));

        $templateProcessor->setValue('start_date', $contract->start_date ? $contract->start_date->format('d/m/Y') : '...............');
        $templateProcessor->setValue('start_day', $contract->start_date ? $contract->start_date->format('d') : '.....');
        $templateProcessor->setValue('start_month', $contract->start_date ? $contract->start_date->format('m') : '.....');
        $templateProcessor->setValue('start_year', $contract->start_date ? $contract->start_date->format('Y') : '.....');

        $templateProcessor->setValue('end_date', $contract->end_date ? $contract->end_date->format('d/m/Y') : '...............');
        $templateProcessor->setValue('end_day', $contract->end_date ? $contract->end_date->format('d') : '.....');
        $templateProcessor->setValue('end_month', $contract->end_date ? $contract->end_date->format('m') : '.....');
        $templateProcessor->setValue('end_year', $contract->end_date ? $contract->end_date->format('Y') : '.....');

        // Calculate Values
        $totalValue = $contract->contract_value ?? 0;
        $valueNoVat = round($totalValue / 1.08);
        $vatAmount = $totalValue - $valueNoVat;

        $templateProcessor->setValue('contract_value_no_vat', number_format($valueNoVat));
        $templateProcessor->setValue('contract_vat_amount', number_format($vatAmount));

        $valueInWords = ucfirst($this->numberToWords($totalValue));
        $templateProcessor->setValue('contract_value_words', $valueInWords);

        $templateProcessor->setValue('location', 'TP. Hồ Chí Minh');

        $tempFileName = tempnam(sys_get_temp_dir(), 'phpword');
        $templateProcessor->saveAs($tempFileName);

        $newFileName = str_replace('CÔNG TY KH', $contract->client_name ?? 'CÔNG TY', $filename);
        $newFileName = str_replace('[MẪU] ', '', $newFileName);
        $newFileName = str_replace('0x0x.2026', $contractCode, $newFileName);

        return response()->download($tempFileName, $newFileName)->deleteFileAfterSend(true);
    }

    private function numberToWords($number)
    {
        if (! is_numeric($number)) {
            return '';
        }
        $number = (int) $number;
        if ($number == 0) {
            return 'không';
        }

        $hyphen = ' ';
        $conjunction = ' ';
        $separator = ' ';
        $negative = 'âm ';
        $decimal = ' phẩy ';
        $dictionary = [
            0 => 'không',
            1 => 'một',
            2 => 'hai',
            3 => 'ba',
            4 => 'bốn',
            5 => 'năm',
            6 => 'sáu',
            7 => 'bảy',
            8 => 'tám',
            9 => 'chín',
            10 => 'mười',
            11 => 'mười một',
            12 => 'mười hai',
            13 => 'mười ba',
            14 => 'mười bốn',
            15 => 'mười lăm',
            16 => 'mười sáu',
            17 => 'mười bảy',
            18 => 'mười tám',
            19 => 'mười chín',
            20 => 'hai mươi',
            30 => 'ba mươi',
            40 => 'bốn mươi',
            50 => 'năm mươi',
            60 => 'sáu mươi',
            70 => 'bảy mươi',
            80 => 'tám mươi',
            90 => 'chín mươi',
            100 => 'trăm',
            1000 => 'nghìn',
            1000000 => 'triệu',
            1000000000 => 'tỷ',
            1000000000000 => 'nghìn tỷ',
            1000000000000000 => 'ngàn triệu triệu',
            1000000000000000000 => 'tỷ tỷ',
        ];

        if ($number < 0) {
            return $negative.$this->numberToWords(abs($number));
        }

        $string = $fraction = null;

        if (strpos((string) $number, '.') !== false) {
            [$number, $fraction] = explode('.', (string) $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens = ((int) ($number / 10)) * 10;
                $units = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen.($units == 1 ? 'mốt' : ($units == 5 ? 'lăm' : $dictionary[$units]));
                }
                break;
            case $number < 1000:
                $hundreds = (int) ($number / 100);
                $remainder = $number % 100;
                $string = $dictionary[$hundreds].' '.$dictionary[100];
                if ($remainder) {
                    $string .= $conjunction.($remainder < 10 ? 'lẻ ' : '').$this->numberToWords($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->numberToWords($numBaseUnits).' '.$dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction.'không trăm '.($remainder < 10 ? 'lẻ ' : '') : $separator;
                    $string .= $this->numberToWords($remainder);
                }
                break;
        }

        if ($fraction !== null && is_numeric($fraction)) {
            $string .= $decimal;
            $words = [];
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }
}
