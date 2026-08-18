@extends('superadmin.layouts.app')

@section('page-title', 'Hàng chờ công việc')

@section('content')
<div class="px-4 sm:px-6 py-8 w-full max-w-7xl mx-auto" x-data="myTasksApp()">
    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-6 gap-4">
       
        
        {{-- Controls bar --}}
        <div class="flex flex-wrap items-center gap-2.5">
            {{-- Search --}}
            <div class="relative flex-1 sm:flex-initial">
                <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" x-model="searchQuery" placeholder="Tìm kiếm công việc..." class="pl-9 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#001B4E] focus:border-[#001B4E] outline-none w-full sm:w-48 text-sm transition-shadow">
            </div>

            {{-- Filter Project --}}
            <select x-model="filterProject" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#001B4E] outline-none text-sm bg-white cursor-pointer max-w-[140px]">
                <option value="">Tất cả dự án</option>
                <template x-for="project in projects" :key="project.id">
                    <option :value="project.id" x-text="project.name"></option>
                </template>
            </select>

            {{-- Filter Department (Chỉ Quản lý / Root mới thấy) --}}
            <template x-if="isAdminOrPm">
                <select x-model="filterDepartment" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#001B4E] outline-none text-sm bg-white cursor-pointer max-w-[150px]">
                    <option value="">Tất cả phòng ban</option>
                    <template x-for="dept in departments" :key="dept">
                        <option :value="dept" x-text="dept"></option>
                    </template>
                </select>
            </template>

            {{-- Filter Assignee (dành cho Admin / PM) --}}
            <template x-if="isAdminOrPm">
                <select x-model="filterUser" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#001B4E] outline-none text-sm bg-white cursor-pointer max-w-[150px]">
                    <option value="">Tất cả nhân sự</option>
                    <template x-for="u in users" :key="'user-filter-'+u.id">
                        <option :value="u.id" x-text="u.name"></option>
                    </template>
                </select>
            </template>

            {{-- Sorting Mode (Nằm bên phải cùng) --}}
            <select x-model="sortMode" class="px-3 py-2 border border-indigo-200 bg-indigo-50/70 text-[#001B4E] font-medium rounded-lg focus:ring-2 focus:ring-[#001B4E] outline-none text-sm cursor-pointer max-w-[170px]">
                <option value="manual">Quan trọng</option>
                <option value="deadline">Khẩn cấp</option>
            </select>
        </div>
    </div>

    {{-- Toast Notification --}}
    <div
        x-show="toast.show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed top-6 right-6 z-[9999] min-w-[280px] max-w-sm px-5 py-3 rounded-xl shadow-xl text-white font-medium text-sm flex items-center gap-3"
        :class="{
            'bg-green-600': toast.type === 'success',
            'bg-red-600':   toast.type === 'error',
            'bg-blue-600':  toast.type === 'info',
        }"
        style="display:none"
    >
        <svg x-show="toast.type==='success'" class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <svg x-show="toast.type==='error'" class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        <svg x-show="toast.type==='info'" class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01"/></svg>
        <span x-text="toast.message"></span>
    </div>

    {{-- Tabs + Add Button --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div class="flex rounded-lg overflow-hidden border border-gray-200 w-fit bg-white shadow-xs">
            <button
                @click="activeTab = 'pending'"
                class="px-5 py-2 text-sm font-medium transition-colors flex items-center gap-2"
                :class="activeTab === 'pending' ? 'bg-[#001B4E] text-white' : 'bg-white text-gray-600 hover:bg-gray-50'"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <span>Cần làm</span>
                <span x-show="pendingTasks.length > 0" x-text="pendingTasks.length" class="ml-1 px-1.5 py-0.5 rounded-full text-xs" :class="activeTab === 'pending' ? 'bg-white/20 text-white' : 'bg-gray-200 text-gray-700'"></span>
            </button>
            <button
                @click="activeTab = 'completed'"
                class="px-5 py-2 text-sm font-medium transition-colors border-l border-gray-200 flex items-center gap-2"
                :class="activeTab === 'completed' ? 'bg-[#001B4E] text-white' : 'bg-white text-gray-600 hover:bg-gray-50'"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Đã hoàn thành</span>
                <span x-show="completedTasks.length > 0" x-text="completedTasks.length" class="ml-1 px-1.5 py-0.5 rounded-full text-xs" :class="activeTab === 'completed' ? 'bg-white/20 text-white' : 'bg-gray-200 text-gray-700'"></span>
            </button>
        </div>

        <div class="flex items-center gap-2.5">
            {{-- Nút Xem Lịch Calendar (Google Calendar Style) --}}
            <button
                type="button"
                @click="openCalendarModal()"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-indigo-200 text-[#001B4E] hover:bg-indigo-50/80 rounded-lg font-semibold transition-all shadow-xs text-sm cursor-pointer"
                title="Xem Lịch công việc Google Calendar"
            >
                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Lịch</span>
            </button>

            <button
                x-show="activeTab === 'pending'"
                @click="openModal()"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#001B4E] text-white rounded-lg hover:bg-[#002D80] font-medium transition-colors shadow-xs text-sm"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span x-text="isAdminOrPm ? 'Tạo việc mới' : 'Thêm  việc mới'"></span>
            </button>
        </div>
    </div>

    {{-- PENDING TASKS TAB --}}
    <div x-show="activeTab === 'pending'">
        <template x-if="filteredPendingTasks.length === 0">
            <div class="bg-white rounded-2xl border border-dashed border-gray-300 p-16 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Không có công việc nào</h3>
                <p class="text-gray-400 text-sm mb-5">Chưa có công việc nào phù hợp với bộ lọc hiện tại.</p>
                <button @click="openModal()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#001B4E] text-white rounded-lg hover:bg-[#002D80] font-medium transition-colors text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tạo công việc ngay
                </button>
            </div>
        </template>

        <template x-if="filteredPendingTasks.length > 0">
            <div>
                <div id="tasks-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 auto-rows-min">
                    <template x-for="(task, index) in filteredPendingTasks" :key="task.id">
                        <div
                            :data-task-id="task.id"
                            @click="openDetailModal(task)"
                            class="drag-handle bg-white rounded-xl border border-gray-200 shadow-xs hover:shadow-md transition-all duration-150 flex flex-col group relative cursor-grab active:cursor-grabbing"
                            :class="{ 
                                'border-red-300 bg-red-50/15': isOverdue(task.deadline_raw), 
                                'border-amber-300': isNearDue(task.deadline_raw) && !isOverdue(task.deadline_raw),
                            }"
                        >
                            {{-- Top Action Header --}}
                            <div class="flex items-center justify-between p-3 pb-0 border-b border-gray-100 bg-gray-50/50 rounded-t-xl">
                                {{-- Project Badge --}}
                                <div class="inline-flex items-center gap-1.5 px-2 py-0.5 bg-indigo-50 text-indigo-700 rounded-md text-[11px] font-semibold truncate max-w-[160px]">
                                    <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                    </svg>
                                    <span class="truncate" x-text="task.project || 'Chưa chọn dự án'"></span>
                                </div>

                                {{-- Quick actions (Delete / Edit) --}}
                                <div class="flex items-center gap-1" @click.stop>
                                    <button
                                        type="button"
                                        @click="openEditModal(task)"
                                        class="p-1 text-gray-400 hover:text-[#001B4E] hover:bg-gray-100 rounded-md transition-colors"
                                        title="Chỉnh sửa công việc"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button
                                        type="button"
                                        @click="openDeleteModal(task)"
                                        class="p-1 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-md transition-colors"
                                        title="Xóa công việc"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-3.5 flex-1 flex flex-col gap-2.5">
                                {{-- Status & Gold Badges Row --}}
                                <div class="flex flex-wrap items-center gap-1.5">
                                    {{-- Gold Reward Badge --}}
                                    @if(config('features.gold_enabled'))
                                    <template x-if="task.gold > 0">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-gradient-to-r from-amber-50 to-yellow-100 border border-amber-300 text-amber-900 text-[11px] font-bold shadow-2xs">
                                            <svg class="w-3 h-3 text-amber-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                <circle cx="10" cy="10" r="8" fill="#FBBF24" stroke="#D97706" stroke-width="1.5"/>
                                                <circle cx="10" cy="10" r="5.5" fill="#F59E0B" stroke="#B45309" stroke-width="0.75"/>
                                                <text x="10" y="13" font-size="8" font-weight="bold" fill="#78350F" text-anchor="middle">G</text>
                                            </svg>
                                            <span x-text="'+' + task.gold + ' Gold'"></span>
                                        </span>
                                    </template>
                                    @endif

                                    {{-- Admin Approval Badge --}}
                                    <template x-if="task.approval_status === 'pending'">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-amber-50 border border-amber-200 text-amber-800 text-[11px] font-medium animate-pulse">
                                            <svg class="w-3 h-3 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            <span>Chờ Admin duyệt</span>
                                        </span>
                                    </template>
                                    <template x-if="task.approval_status === 'rejected'">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-red-50 border border-red-200 text-red-700 text-[11px] font-medium">
                                            <svg class="w-3 h-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            <span>Admin từ chối</span>
                                        </span>
                                    </template>

                                    {{-- Acceptance Badge (Việc mới) --}}
                                    <template x-if="task.acceptance_status === 'pending'">
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-purple-100 border border-purple-300 text-purple-900 text-[11px] font-bold shadow-2xs">
                                            <span class="w-1.5 h-1.5 rounded-full bg-purple-600 animate-ping"></span>
                                            <span>Việc mới</span>
                                        </span>
                                    </template>
                                    <template x-if="task.acceptance_status === 'rejected'">
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-rose-50 border border-rose-200 text-rose-800 text-[11px] font-medium">
                                            <svg class="w-3 h-3 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                            <span>Nhân sự từ chối</span>
                                        </span>
                                    </template>
                                </div>

                                {{-- Title --}}
                                <h3 class="font-bold text-gray-900 leading-snug text-sm line-clamp-2" x-text="task.title"></h3>

                                {{-- Description snippet if exists --}}
                                <template x-if="task.description">
                                    <p class="text-xs text-gray-500 line-clamp-2" x-text="task.description"></p>
                                </template>

                                {{-- Assignee & Department info --}}
                                <div class="mt-auto pt-2 border-t border-gray-100 flex items-center justify-between text-xs text-gray-600">
                                    <div class="flex items-center gap-1.5 truncate">
                                        <div class="w-6 h-6 rounded-full bg-[#001B4E] text-white flex items-center justify-center text-[10px] font-bold shrink-0" x-text="(task.assignee_name || 'U').substring(0, 1).toUpperCase()"></div>
                                        <div class="truncate">
                                            <span class="font-medium text-gray-900 block truncate" x-text="task.assignee_name"></span>
                                            <span class="text-[10px] text-gray-400 block truncate" x-text="task.assignee_department"></span>
                                        </div>
                                    </div>
                                    
                                    {{-- Deadline badge with Icon (3 Màu: Xanh lá >2 ngày, Vàng <=2 ngày, Đỏ hết hạn) --}}
                                    <div class="text-right shrink-0">
                                        <template x-if="task.deadline">
                                            <div
                                                class="flex items-center gap-1 font-black"
                                                :class="isOverdue(task.deadline_raw) ? 'text-red-600' : (isNearDue(task.deadline_raw) ? 'text-amber-500' : 'text-emerald-600')"
                                                :title="isOverdue(task.deadline_raw) ? 'Đã hết hạn deadline' : (isNearDue(task.deadline_raw) ? 'Gần tới hạn (<= 2 ngày)' : 'Chưa tới hạn deadline')"
                                            >
                                                <svg class="w-3.5 h-3.5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                <span class="text-xs font-black tracking-tight" x-text="formatDateShort(task.deadline)"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            {{-- Card Footer Actions --}}
                            <div class="p-3 pt-0 flex flex-col gap-2" @click.stop>
                                {{-- 1. NÚT DUYỆT CỦA ADMIN / PM (nếu đang chờ duyệt) --}}
                                <template x-if="isAdminOrPm && task.approval_status === 'pending'">
                                    <div class="flex items-center gap-1.5 w-full">
                                        <button
                                            type="button"
                                            @click="approveTask(task.id)"
                                            class="flex-1 py-1.5 px-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-semibold flex items-center justify-center gap-1 transition-colors shadow-xs"
                                        >
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            <span>Duyệt task</span>
                                        </button>
                                        <button
                                            type="button"
                                            @click="openRejectApprovalModal(task)"
                                            class="py-1.5 px-2.5 bg-red-50 hover:bg-red-100 text-red-700 border border-red-200 rounded-lg text-xs font-medium transition-colors"
                                            title="Từ chối duyệt"
                                        >
                                            <span>Từ chối</span>
                                        </button>
                                    </div>
                                </template>

                                {{-- 2. NÚT NHẬN VIỆC CỦA NHÂN SỰ ĐƯỢC GIAO (nếu đang pending acceptance) --}}
                                <template x-if="task.can_accept">
                                    <div class="flex items-center gap-1.5 w-full bg-purple-50 p-1.5 rounded-lg border border-purple-200">
                                        <button
                                            type="button"
                                            @click="acceptTask(task.id)"
                                            class="flex-1 py-1.5 px-2 bg-purple-600 hover:bg-purple-700 text-white rounded-md text-xs font-semibold flex items-center justify-center gap-1 transition-colors shadow-xs"
                                        >
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            <span>Nhận việc (Accept)</span>
                                        </button>
                                        <button
                                            type="button"
                                            @click="openDeclineModal(task)"
                                            class="py-1.5 px-2 bg-white hover:bg-rose-50 text-rose-700 border border-rose-300 rounded-md text-xs font-medium transition-colors"
                                        >
                                            <span>Từ chối</span>
                                        </button>
                                    </div>
                                </template>

                                {{-- NÚT ĐIỀU PHỐI LẠI CỦA QUẢN LÝ / ROOT KHI CÔNG VIỆC BỊ TỪ CHỐI --}}
                                <template x-if="isAdminOrPm && (task.acceptance_status === 'rejected' || task.approval_status === 'rejected')">
                                    <div class="flex items-center gap-1.5 w-full bg-indigo-50/70 p-1.5 rounded-lg border border-indigo-200">
                                        <button
                                            type="button"
                                            @click="openReassignModal(task)"
                                            class="w-full py-1.5 px-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors shadow-xs"
                                        >
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                                            <span>Điều phối lại cho nhân sự khác</span>
                                        </button>
                                    </div>
                                </template>

                                {{-- 3. NÚT HOÀN THÀNH TASK (khi task đã sẵn sàng) --}}
                                <template x-if="task.acceptance_status === 'accepted'">
                                    <button
                                        type="button"
                                        @click="completeTask(task.id)"
                                        class="w-full flex items-center justify-center gap-1.5 py-1.5 px-3 rounded-lg border border-emerald-200 bg-emerald-50/40 text-xs font-semibold text-emerald-800 hover:bg-emerald-100 hover:border-emerald-300 transition-colors"
                                    >
                                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span>Hoàn thành</span>
                                       
                                    </button>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </template>
    </div>

    {{-- COMPLETED TASKS TAB --}}
    <div x-show="activeTab === 'completed'" style="display:none">
        <template x-if="filteredCompletedTasks.length === 0">
            <div class="bg-white rounded-2xl border border-dashed border-gray-300 p-16 flex flex-col items-center justify-center text-center">
                <svg class="w-16 h-16 text-emerald-500 mb-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Chưa có công việc nào hoàn thành</h3>
                <p class="text-gray-400 text-sm">Các công việc sau khi hoàn thành sẽ xuất hiện tại đây.</p>
            </div>
        </template>
        
        <template x-if="filteredCompletedTasks.length > 0">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 auto-rows-min">
                <template x-for="task in filteredCompletedTasks" :key="'completed-'+task.id">
                    <div 
                        @click="openDetailModal(task)"
                        class="bg-white rounded-xl border border-gray-100 shadow-xs opacity-85 hover:opacity-100 transition-all duration-200 cursor-pointer p-4 flex flex-col gap-2.5"
                    >
                        <div class="flex items-center justify-between">
                            <div class="flex flex-wrap items-center gap-1.5">
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-semibold">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    Đã hoàn thành
                                </span>
                                @if(config('features.gold_enabled'))
                                <template x-if="task.gold > 0">
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold"
                                        :class="task.gold_awarded ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' : 'bg-amber-50 text-amber-800 border border-amber-300 animate-pulse'">
                                        <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" fill="#FBBF24"/><text x="10" y="13" font-size="8" font-weight="bold" fill="#78350F" text-anchor="middle">G</text></svg>
                                        <span x-text="task.gold_awarded ? 'Đã nhận +' + task.gold + ' Gold' : 'Chờ duyệt +' + task.gold + ' Gold'"></span>
                                    </span>
                                </template>
                                @endif
                            </div>
                            <span class="text-[11px] text-gray-400" x-text="task.completed_at"></span>
                        </div>

                        <h3 class="font-semibold text-gray-800 text-sm line-clamp-2" x-text="task.title"></h3>

                        <div class="text-xs text-gray-500 flex items-center justify-between">
                            <span x-text="task.project || 'Dự án chung'"></span>
                            <span class="font-medium text-gray-700" x-text="task.assignee_name"></span>
                        </div>

                        <div class="flex flex-col gap-1.5 mt-1" @click.stop>
                            {{-- NÚT DUYỆT & TRAO GOLD DÀNH CHO QUẢN LÝ / ADMIN --}}
                            @if(config('features.gold_enabled'))
                            <template x-if="isAdminOrPm && task.gold > 0 && !task.gold_awarded">
                                <button
                                    type="button"
                                    @click="approveGold(task.id)"
                                    class="w-full flex items-center justify-center gap-1.5 py-1.5 px-3 rounded-lg bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white text-xs font-bold transition-all shadow-xs"
                                >
                                    <svg class="w-3.5 h-3.5 text-amber-100" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" fill="#FBBF24"/><text x="10" y="13" font-size="8" font-weight="bold" fill="#78350F" text-anchor="middle">G</text></svg>
                                    <span>Duyệt & Trao thưởng</span>
                                    <span x-text="'(+' + task.gold + ' Gold)'"></span>
                                </button>
                            </template>
                            @endif

                            {{-- THÔNG BÁO CHO NHÂN SỰ KHI ĐANG CHỜ DUYỆT GOLD --}}
                            @if(config('features.gold_enabled'))
                            <template x-if="!isAdminOrPm && task.gold > 0 && !task.gold_awarded">
                                <div class="text-center text-[11px] text-amber-700 bg-amber-50/80 py-1.5 px-2 rounded-lg border border-amber-200 font-medium">
                                    Đang chờ Quản lý duyệt nghiệm thu để nhận <strong x-text="'+' + task.gold + ' Gold'"></strong>
                                </div>
                            </template>
                            @endif

                            {{-- NÚT KHÔI PHỤC TASK --}}
                            <button
                                type="button"
                                @click="restoreTask(task.id)"
                                class="w-full flex items-center justify-center gap-1.5 py-1 px-3 rounded-lg border border-gray-200 text-xs font-medium text-gray-600 hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 transition-colors"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                                <span>Khôi phục lại</span>
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </template>
    </div>

    {{-- MODAL: THÊM CÔNG VIỆC & ĐIỀU PHỐI --}}
    <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" style="display:none">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-xs" @click="closeModal()"></div>

            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-xl mx-auto overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-bold text-[#001B4E] flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Tạo công việc & Điều phối nhân sự</span>
                    </h3>
                    <button @click="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="p-6 space-y-4 max-h-[80vh] overflow-y-auto">
                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Tên công việc <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            x-model="form.title"
                            placeholder="VD: Thiết kế giao diện trang chủ, Fix lỗi thanh toán..."
                            class="w-full rounded-lg border px-4 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none"
                            :class="formErrors.title ? 'border-red-400 bg-red-50/20' : 'border-gray-300'"
                        >
                        <template x-if="formErrors.title">
                            <p class="mt-1 text-xs text-red-600" x-text="formErrors.title"></p>
                        </template>
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Mô tả chi tiết
                        </label>
                        <textarea
                            x-model="form.description"
                            rows="3"
                            placeholder="Chi tiết yêu cầu, link tài liệu hoặc ghi chú thực hiện..."
                            class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none"
                        ></textarea>
                    </div>

                    {{-- Project --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Dự án <span class="text-red-500">*</span>
                        </label>
                        <select
                            x-model="form.project_id"
                            class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none bg-white"
                            :class="formErrors.project_id ? 'border-red-400' : 'border-gray-300'"
                        >
                            <option value="">-- Chọn dự án --</option>
                            <template x-for="project in projects" :key="'modal-proj-'+project.id">
                                <option :value="project.id" x-text="project.name"></option>
                            </template>
                        </select>
                        {{-- Project Gold Pool Status --}}
                        @if(config('features.gold_enabled'))
                        <template x-if="currentProjectInfo">
                            <div class="mt-1.5 px-3 py-1.5 bg-amber-50/80 border border-amber-200 rounded-lg flex items-center justify-between text-xs">
                                <span class="text-amber-800 font-medium flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8" fill="#FBBF24"/><text x="10" y="13" font-size="8" font-weight="bold" fill="#78350F" text-anchor="middle">G</text></svg>
                                    Quỹ Gold dự án: <strong x-text="currentProjectInfo.total_gold + ' Gold'"></strong>
                                </span>
                                <span class="text-emerald-700 font-bold">
                                    Còn khả dụng: <span x-text="currentProjectInfo.remaining_gold + ' Gold'"></span>
                                </span>
                            </div>
                        </template>
                        @endif
                        <template x-if="formErrors.project_id">
                            <p class="mt-1 text-xs text-red-600" x-text="formErrors.project_id"></p>
                        </template>
                    </div>

                    {{-- Gold Points Reward (Chỉ cấp Quản lý / Root mới được tạo) --}}
                    @if(config('features.gold_enabled'))
                    <template x-if="isAdminOrPm">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Điểm thưởng Gold cho công việc
                            </label>
                            <div class="relative">
                                <input
                                    type="number"
                                    min="0"
                                    step="10"
                                    x-model.number="form.gold"
                                    placeholder="Nhập số Gold thưởng (VD: 50, 100, 200...)"
                                    class="w-full rounded-lg border border-gray-300 pl-4 pr-16 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none"
                                >
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs font-bold text-amber-600">GOLD</span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Chỉ cấp Quản lý mới có quyền phân bổ Gold thưởng từ quỹ dự án.</p>
                        </div>
                    </template>
                    @endif

                    {{-- Điều phối nhân sự (Chỉ cấp Quản lý / Root mới được điều phối nhân sự khác) --}}
                    <template x-if="isAdminOrPm">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Điều phối nhân sự thực hiện
                            </label>
                            <select
                                x-model="form.assigned_to"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none bg-white"
                            >
                                <option value="">-- Chọn nhân sự thực hiện --</option>
                                <template x-for="u in users" :key="'assign-opt-'+u.id">
                                    <option :value="u.id" x-text="u.name"></option>
                                </template>
                            </select>
                            <p class="text-xs text-gray-400 mt-1">Chọn nhân sự thuộc phòng ban (Thiết kế, Thiết kế website, Quản lý dự án) để phân công.</p>
                        </div>
                    </template>

                    {{-- Dates Row --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Ngày bắt đầu
                            </label>
                            <input
                                type="date"
                                x-model="form.start_date"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Deadline <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="date"
                                x-model="form.deadline"
                                class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none"
                                :class="formErrors.deadline ? 'border-red-400 bg-red-50/20' : 'border-gray-300'"
                            >
                            <template x-if="formErrors.deadline">
                                <p class="mt-1 text-xs text-red-600" x-text="formErrors.deadline"></p>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex justify-end gap-3 border-t border-gray-100">
                    <button
                        type="button"
                        @click="closeModal()"
                        class="px-5 py-2 rounded-lg border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-100 transition-colors"
                    >
                        Hủy
                    </button>
                    <button
                        type="button"
                        @click="saveTask()"
                        :disabled="isSaving"
                        class="px-6 py-2 bg-[#001B4E] text-white rounded-lg text-sm font-medium hover:bg-[#002D80] transition-colors disabled:opacity-60 flex items-center gap-2"
                    >
                        <span x-show="!isSaving">Tạo công việc</span>
                        <span x-show="isSaving" class="flex items-center gap-2" style="display:none">
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                            Đang tạo...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL: CHỈNH SỬA CÔNG VIỆC --}}
    <div x-show="showEditModal" class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" style="display:none">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-xs" @click="closeEditModal()"></div>

            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-xl mx-auto overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-bold text-[#001B4E] flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Chỉnh sửa công việc & Điều phối</span>
                    </h3>
                    <button type="button" @click="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="p-6 space-y-4 max-h-[80vh] overflow-y-auto">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Tên công việc <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            x-model="editForm.title"
                            required
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Mô tả chi tiết
                        </label>
                        <textarea
                            x-model="editForm.description"
                            rows="3"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none"
                        ></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Dự án <span class="text-red-500">*</span>
                        </label>
                        <select
                            x-model="editForm.project_id"
                            required
                            class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none bg-white"
                        >
                            <template x-for="project in projects" :key="'edit-modal-proj-'+project.id">
                                <option :value="project.id" x-text="project.name" :selected="project.id == editForm.project_id"></option>
                            </template>
                        </select>
                    </div>

                    {{-- Gold Reward in Edit (Chỉ Quản lý / Root mới được sửa) --}}
                    @if(config('features.gold_enabled'))
                    <template x-if="isAdminOrPm">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Điểm thưởng Gold cho công việc
                            </label>
                            <div class="relative">
                                <input
                                    type="number"
                                    min="0"
                                    step="10"
                                    x-model.number="editForm.gold"
                                    placeholder="VD: 50, 100..."
                                    class="w-full rounded-lg border border-gray-300 pl-4 pr-16 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none"
                                >
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs font-bold text-amber-600">GOLD</span>
                            </div>
                        </div>
                    </template>
                    <template x-if="!isAdminOrPm && editForm.gold > 0">
                        <div class="p-3 bg-amber-50/80 rounded-lg border border-amber-200 flex items-center justify-between text-xs">
                            <span class="text-gray-600 font-medium">Điểm thưởng hoàn thành:</span>
                            <span class="font-bold text-amber-800" x-text="editForm.gold + ' Gold'"></span>
                        </div>
                    </template>
                    @endif

                    {{-- Điều phối nhân sự (Edit - Chỉ Quản lý / Root mới được đổi nhân sự) --}}
                    <template x-if="isAdminOrPm">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Điều phối nhân sự thực hiện
                            </label>
                            <select
                                x-model="editForm.assigned_to"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none bg-white"
                            >
                                <template x-for="u in users" :key="'edit-assign-'+u.id">
                                    <option :value="u.id" x-text="u.name" :selected="u.id == editForm.assigned_to"></option>
                                </template>
                            </select>
                        </div>
                    </template>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Deadline <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="date"
                            x-model="editForm.deadline"
                            required
                            class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-[#001B4E] focus:ring-2 focus:ring-[#001B4E]/20 outline-none"
                        >
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex justify-end gap-3 border-t border-gray-100">
                    <button
                        type="button"
                        @click="closeEditModal()"
                        class="px-5 py-2 rounded-lg border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-100 transition-colors"
                    >
                        Hủy
                    </button>
                    <button
                        type="button"
                        @click="updateTask()"
                        :disabled="isUpdating"
                        class="px-6 py-2 bg-[#001B4E] text-white rounded-lg text-sm font-medium hover:bg-[#002D80] transition-colors disabled:opacity-60 flex items-center gap-2"
                    >
                        <span x-show="!isUpdating">Lưu thay đổi</span>
                        <span x-show="isUpdating" class="flex items-center gap-2" style="display:none">
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                            Đang lưu...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL: CHI TIẾT CÔNG VIỆC --}}
    <div x-show="showDetailModal" class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" style="display:none">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-xs" @click="closeDetailModal()"></div>

            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-auto overflow-hidden">
                <template x-if="selectedTask">
                    <div>
                        <div class="px-6 py-4 border-b border-gray-100 flex items-start justify-between bg-gray-50">
                            <div>
                                <span class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Chi tiết công việc</span>
                                <h3 class="text-lg font-bold text-gray-900 mt-0.5" x-text="selectedTask.title"></h3>
                            </div>
                            <button @click="closeDetailModal()" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            </button>
                        </div>

                        <div class="p-6 space-y-3.5 text-sm">
                            <div class="flex justify-between items-center py-1.5 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Dự án:</span>
                                <span class="font-semibold text-gray-900" x-text="selectedTask.project || 'N/A'"></span>
                            </div>

                            {{-- Điểm thưởng Gold --}}
                            @if(config('features.gold_enabled'))
                            <div class="flex justify-between items-center py-1.5 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Thưởng Gold:</span>
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-amber-700 text-sm" x-text="'+' + (selectedTask.gold || 0) + ' Gold'"></span>
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-semibold" :class="selectedTask.gold_awarded ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-600'" x-text="selectedTask.gold_awarded ? 'Đã nhận thưởng' : 'Chưa nhận thưởng'"></span>
                                </div>
                            </div>
                            @endif

                            <div class="flex justify-between items-center py-1.5 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Người tạo / Giao:</span>
                                <span class="font-medium text-gray-900" x-text="selectedTask.creator_name"></span>
                            </div>

                            <div class="flex justify-between items-center py-1.5 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Nhân sự thực hiện:</span>
                                <div>
                                    <span class="font-semibold text-[#001B4E]" x-text="selectedTask.assignee_name"></span>
                                    <span class="text-xs text-gray-400 ml-1" x-text="'(' + selectedTask.assignee_department + ')'"></span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center py-1.5 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Duyệt Admin/PM:</span>
                                <span class="font-medium text-xs px-2.5 py-0.5 rounded-full" :class="selectedTask.approval_status === 'approved' ? 'bg-emerald-100 text-emerald-800' : (selectedTask.approval_status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800')" x-text="selectedTask.approval_status === 'approved' ? 'Đã duyệt' : (selectedTask.approval_status === 'pending' ? 'Chờ duyệt' : 'Từ chối')"></span>
                            </div>

                            <div class="flex justify-between items-center py-1.5 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Nhận việc:</span>
                                <span class="font-bold text-xs px-2.5 py-0.5 rounded-full" :class="selectedTask.acceptance_status === 'accepted' ? 'bg-purple-100 text-purple-800' : (selectedTask.acceptance_status === 'pending' ? 'bg-purple-100 text-purple-900 border border-purple-300' : 'bg-rose-100 text-rose-800')" x-text="selectedTask.acceptance_status === 'accepted' ? 'Đã nhận việc' : (selectedTask.acceptance_status === 'pending' ? 'Việc mới (Chờ nhận việc)' : 'Đã từ chối')"></span>
                            </div>

                            <template x-if="selectedTask.rejection_reason">
                                <div class="p-3 bg-red-50 rounded-lg border border-red-200 text-xs text-red-700">
                                    <strong>Lý do từ chối:</strong> <span x-text="selectedTask.rejection_reason"></span>
                                </div>
                            </template>

                            <div class="flex justify-between items-center py-1.5 border-b border-gray-100">
                                <span class="text-gray-500 font-medium">Hạn chót (Deadline):</span>
                                <span class="font-bold text-gray-900" x-text="(selectedTask.deadline_full || selectedTask.deadline) || '---'"></span>
                            </div>

                            <template x-if="selectedTask.description">
                                <div class="pt-2">
                                    <span class="text-gray-500 font-medium block mb-1">Mô tả:</span>
                                    <p class="text-gray-700 bg-gray-50 p-3 rounded-lg text-xs leading-relaxed whitespace-pre-line" x-text="selectedTask.description"></p>
                                </div>
                            </template>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between gap-2">
                            <div>
                                <template x-if="isAdminOrPm && (selectedTask.acceptance_status === 'rejected' || selectedTask.approval_status === 'rejected')">
                                    <button
                                        type="button"
                                        @click="openReassignModal(selectedTask); closeDetailModal()"
                                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-xs font-semibold transition-colors flex items-center gap-1.5 shadow-xs"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                                        <span>Điều phối lại nhân sự khác</span>
                                    </button>
                                </template>
                            </div>
                            <button type="button" @click="closeDetailModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-300">
                                Đóng
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

    {{-- MODAL: ĐIỀU PHỐI LẠI NHÂN SỰ (REASSIGN) --}}
    <div x-show="showReassignModal" class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" style="display:none">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-xs" @click="closeReassignModal()"></div>

            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg mx-auto overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-indigo-50/70">
                    <h3 class="text-base font-bold text-[#001B4E] flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                        <span>Điều phối lại công việc</span>
                    </h3>
                    <button type="button" @click="closeReassignModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="p-6 space-y-4">
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-200 text-xs">
                        <span class="text-gray-500 font-semibold block mb-0.5">Công việc cần giao lại:</span>
                        <p class="font-bold text-gray-900 text-sm" x-text="taskToReassign?.title"></p>
                        <template x-if="taskToReassign?.rejection_reason">
                            <p class="mt-2 text-red-600 bg-red-50 p-2 rounded-lg border border-red-100 leading-relaxed">
                                <strong>Lý do từ chối trước đó:</strong> <span x-text="taskToReassign.rejection_reason"></span>
                            </p>
                        </template>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Chọn nhân sự mới tiếp nhận công việc <span class="text-red-500">*</span>
                        </label>
                        <select
                            x-model="reassignUserId"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-100 outline-none bg-white font-medium"
                        >
                            <option value="">-- Chọn nhân sự mới --</option>
                            <template x-for="u in users" :key="'reassign-u-'+u.id">
                                <option :value="u.id" x-text="u.name"></option>
                            </template>
                        </select>
                        <p class="text-xs text-gray-400 mt-1">Công việc sẽ được tự động kích hoạt lại và chuyển sang hàng chờ của nhân sự mới.</p>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex justify-end gap-3 border-t border-gray-100">
                    <button
                        type="button"
                        @click="closeReassignModal()"
                        class="px-5 py-2 rounded-lg border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-100 transition-colors"
                    >
                        Hủy
                    </button>
                    <button
                        type="button"
                        @click="submitReassignTask()"
                        :disabled="isReassigning || !reassignUserId"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg text-sm font-semibold hover:bg-indigo-700 transition-colors disabled:opacity-50 flex items-center gap-2"
                    >
                        <span x-show="!isReassigning">Xác nhận điều phối lại</span>
                        <span x-show="isReassigning" class="flex items-center gap-2" style="display:none">
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                            Đang xử lý...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL: NHẬP LÝ DO TỪ CHỐI --}}
    <div x-show="showReasonModal" class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" style="display:none">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black/60" @click="showReasonModal = false"></div>
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md mx-auto p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2" x-text="reasonModalTitle"></h3>
                <p class="text-xs text-gray-500 mb-4">Vui lòng nhập lý do để người giao việc / hệ thống nắm thông tin:</p>
                <textarea x-model="rejectionReasonText" rows="3" placeholder="Nhập lý do..." class="w-full rounded-lg border border-gray-300 p-3 text-sm focus:border-red-500 focus:ring-2 focus:ring-red-200 outline-none mb-4"></textarea>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="showReasonModal = false" class="px-4 py-2 rounded-lg border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-100">
                        Hủy
                    </button>
                    <button type="button" @click="submitReasonAction()" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm font-medium">
                        Xác nhận từ chối
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- DELETE CONFIRMATION MODAL --}}
    <div x-show="showDeleteModal" class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true" role="dialog" style="display:none">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-xs" @click="closeDeleteModal()"></div>

            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md mx-auto p-6 text-center">
                <div class="w-14 h-14 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4 ring-8 ring-red-50">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">Xác nhận xóa công việc?</h3>
                <p class="text-sm text-gray-500 mb-6">
                    Công việc <span class="font-semibold text-gray-900" x-text="'\"' + (taskToDelete?.title || '') + '\"'"></span> sẽ bị xóa vĩnh viễn khỏi danh sách.
                </p>

                <div class="flex gap-3 justify-center">
                    <button type="button" @click="closeDeleteModal()" class="w-1/2 px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-medium text-gray-700 hover:bg-gray-100">
                        Quay lại
                    </button>
                    <button type="button" @click="confirmDeleteTask()" class="w-1/2 px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-semibold transition-all shadow-md shadow-red-200">
                        Xác nhận xóa
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL: GOOGLE CALENDAR VIEW POPUP --}}
    <div
        x-show="showCalendarModal"
        class="fixed inset-0 z-50 overflow-y-auto"
        aria-modal="true"
        role="dialog"
        style="display:none"
        @keydown.escape.window="closeCalendarModal()"
    >
        <div class="flex items-center justify-center min-h-screen p-2 sm:p-4 md:p-6">
            <div class="fixed inset-0 bg-black/60 backdrop-blur-xs transition-opacity" @click="closeCalendarModal()"></div>

            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-6xl mx-auto overflow-hidden flex flex-col max-h-[92vh] border border-gray-100">
                {{-- Calendar Header --}}
                <div class="flex flex-wrap items-center justify-between px-6 py-4 border-b border-gray-100 bg-white gap-4 flex-shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 bg-indigo-50 text-indigo-700 rounded-xl border border-indigo-100 shadow-2xs">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-[#001B4E] flex items-center gap-2">
                                <span>Lịch Công Việc</span>
                                
                            </h2>
                            <p class="text-xs text-gray-500">Theo dõi deadline, tiến độ công việc và điểm thưởng Gold trực quan theo lịch</p>
                        </div>
                    </div>

                    {{-- Navigation & Date controls --}}
                    <div class="flex items-center gap-2">
                        <button
                            type="button"
                            @click="calToday()"
                            class="px-3.5 py-1.5 rounded-lg border border-gray-300 text-sm font-bold text-gray-700 hover:bg-gray-50 transition-colors shadow-2xs cursor-pointer"
                        >
                            Hôm nay
                        </button>
                        <div class="flex items-center rounded-lg border border-gray-300 overflow-hidden shadow-2xs">
                            <button
                                type="button"
                                @click="calPrevMonth()"
                                class="p-1.5 text-gray-600 hover:bg-gray-100 transition-colors cursor-pointer"
                                title="Tháng trước"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button
                                type="button"
                                @click="calNextMonth()"
                                class="p-1.5 text-gray-600 hover:bg-gray-100 transition-colors border-l border-gray-200 cursor-pointer"
                                title="Tháng sau"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                        <span class="text-lg font-extrabold text-gray-900 ml-2 min-w-[150px]" x-text="calCurrentMonthLabel"></span>
                    </div>

                    <div class="flex items-center gap-2.5">
                        {{-- Project filter inside calendar --}}
                        <select x-model="calFilterProject" class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm bg-white outline-none cursor-pointer">
                            <option value="">Tất cả dự án</option>
                            <template x-for="p in projects" :key="'cal-p-'+p.id">
                                <option :value="p.id" x-text="p.name"></option>
                            </template>
                        </select>

                        <button type="button" @click="closeCalendarModal()" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Calendar Body Grid --}}
                <div class="flex-1 overflow-y-auto p-4 bg-gray-50/50">
                    {{-- 7 Weekday Headers --}}
                    <div class="grid grid-cols-7 gap-px mb-1 text-center bg-gray-200 rounded-t-xl overflow-hidden border border-gray-200">
                        <div class="py-2.5 bg-gray-100 text-xs font-bold text-gray-700 uppercase">Thứ Hai</div>
                        <div class="py-2.5 bg-gray-100 text-xs font-bold text-gray-700 uppercase">Thứ Ba</div>
                        <div class="py-2.5 bg-gray-100 text-xs font-bold text-gray-700 uppercase">Thứ Tư</div>
                        <div class="py-2.5 bg-gray-100 text-xs font-bold text-gray-700 uppercase">Thứ Năm</div>
                        <div class="py-2.5 bg-gray-100 text-xs font-bold text-gray-700 uppercase">Thứ Sáu</div>
                        <div class="py-2.5 bg-gray-100 text-xs font-bold text-gray-700 uppercase">Thứ Bảy</div>
                        <div class="py-2.5 bg-red-50 text-xs font-bold text-red-700 uppercase">Chủ Nhật</div>
                    </div>

                    {{-- Days Matrix --}}
                    <div class="grid grid-cols-7 gap-px bg-gray-200 border border-gray-200 rounded-b-xl overflow-hidden shadow-xs">
                        <template x-for="day in calDaysGrid" :key="day.dateStr">
                            <div
                                class="min-h-[108px] p-1.5 transition-colors flex flex-col justify-between"
                                :class="[
                                    day.isCurrentMonth ? 'bg-white hover:bg-indigo-50/20' : 'bg-gray-50/70 text-gray-400',
                                    day.isToday ? 'ring-2 ring-indigo-500 ring-inset bg-indigo-50/30' : ''
                                ]"
                            >
                                <div class="flex items-center justify-between mb-1">
                                    <span
                                        class="text-xs font-bold w-6 h-6 flex items-center justify-center rounded-full"
                                        :class="day.isToday ? 'bg-indigo-600 text-white font-black' : (day.isCurrentMonth ? 'text-gray-800' : 'text-gray-400')"
                                        x-text="day.dayNumber"
                                    ></span>
                                    <template x-if="day.tasks.length > 0">
                                        <span class="text-[10px] font-semibold text-gray-500 px-1.5 py-0.5 rounded-full bg-gray-100" x-text="day.tasks.length + ' việc'"></span>
                                    </template>
                                </div>

                                {{-- Task Badges in Day Cell --}}
                                <div class="space-y-1 flex-1 overflow-y-auto max-h-[85px] pr-0.5">
                                    <template x-for="t in day.tasks.slice(0, 3)" :key="'day-t-'+t.id">
                                        <div
                                            @click="openDetailModal(t)"
                                            class="p-1 rounded-md text-[11px] font-medium truncate cursor-pointer transition-all shadow-2xs border flex items-center justify-between gap-1 group"
                                            :class="getCalTaskBadgeClass(t)"
                                            :title="t.title + ' (' + (t.status === 'completed' ? 'Đã hoàn thành' : 'Deadline') + ')'"
                                        >
                                            <div class="flex items-center gap-1 min-w-0 flex-1">
                                                <span class="w-1.5 h-1.5 rounded-full flex-shrink-0" :class="getCalTaskDotClass(t)"></span>
                                                <span class="truncate font-semibold text-gray-900 group-hover:text-indigo-700" x-text="t.title"></span>
                                            </div>
                                            @if(config('features.gold_enabled'))
                                            <template x-if="t.gold > 0">
                                                <span class="text-[9px] font-bold text-amber-700 bg-amber-100 px-1 py-0.2 rounded-xs flex-shrink-0" x-text="'+' + t.gold + 'G'"></span>
                                            </template>
                                            @endif
                                        </div>
                                    </template>

                                    <template x-if="day.tasks.length > 3">
                                        <div
                                            class="w-full text-center text-[10px] font-bold text-indigo-700 bg-indigo-50/80 py-0.5 rounded-sm"
                                            x-text="'+' + (day.tasks.length - 3) + ' việc khác...'"
                                        ></div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Calendar Footer Legend --}}
                <div class="px-6 py-3 bg-gray-50 border-t border-gray-100 flex flex-wrap items-center justify-between gap-3 text-xs flex-shrink-0">
                    <div class="flex items-center gap-4 text-gray-600">
                        <span class="font-bold text-gray-800">Chú thích:</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                            <span>Đang làm (Todo)</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            <span>Đang tiến hành</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                            <span>Khẩn cấp / Quá hạn</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            <span>Đã hoàn thành</span>
                        </div>
                    </div>

                    <button
                        type="button"
                        @click="closeCalendarModal()"
                        class="px-5 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg transition-colors text-sm cursor-pointer"
                    >
                        Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- POPUP REALTIME SYNC NOTIFICATION --}}
    <div
        x-show="realtimeAlert.show"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-8 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-8 scale-95"
        class="fixed bottom-6 right-6 z-50 max-w-md w-full bg-[#001B4E] text-white p-4 rounded-2xl shadow-2xl border-2 border-indigo-400/40 backdrop-blur-md flex items-start gap-3.5"
        style="display:none"
    >
        <div class="p-2.5 bg-gradient-to-tr from-amber-400 to-yellow-300 rounded-xl text-[#001B4E] shadow-lg flex-shrink-0 animate-bounce">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
        </div>
        <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between gap-2">
                <h4 class="text-sm font-bold text-amber-300 uppercase tracking-wide flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    <span>Đồng bộ Thời gian thực</span>
                </h4>
                <span class="text-[11px] text-gray-300" x-text="realtimeAlert.time"></span>
            </div>
            <p class="text-sm text-gray-100 mt-1 font-medium leading-relaxed" x-text="realtimeAlert.message"></p>
            <p class="text-xs text-gray-400 mt-1 italic">Dữ liệu công việc của bạn đã tự động cập nhật mới nhất theo thời gian thực.</p>
        </div>
        <button
            type="button"
            @click="realtimeAlert.show = false"
            class="text-gray-400 hover:text-white transition-colors p-1"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    {{-- STANDARD TOAST NOTIFICATION --}}
    <div
        x-show="toast.show"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
        class="fixed top-6 right-6 z-50 px-5 py-3 rounded-xl shadow-2xl flex items-center gap-3 text-sm font-medium border"
        :class="toast.type === 'error' ? 'bg-red-600 text-white border-red-700' : 'bg-emerald-600 text-white border-emerald-700'"
        style="display:none"
    >
        <svg x-show="toast.type !== 'error'" class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        <svg x-show="toast.type === 'error'" class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        <span x-text="toast.message"></span>
    </div>
</div>
@endsection

@push('styles')
<style>
    .task-ghost {
        background-color: #e2e8f0 !important;
        border: none !important;
        opacity: 1 !important;
        border-radius: 0.75rem !important;
    }
    .task-ghost * {
        visibility: hidden !important;
    }
    .task-fallback, .sortable-fallback, .task-drag {
        opacity: 1 !important;
        background-color: #ffffff !important;
        box-shadow: 0 20px 35px -5px rgba(0, 0, 0, 0.25), 0 0 0 2px #4f46e5 !important;
        cursor: grabbing !important;
        z-index: 999999 !important;
        border-radius: 0.75rem !important;
    }
</style>
@endpush

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('myTasksApp', () => ({
        activeTab: 'pending',
        showModal: false,
        showEditModal: false,
        showDeleteModal: false,
        showDetailModal: false,
        showReasonModal: false,
        reasonModalTitle: '',
        reasonActionType: '', // 'reject_approval' | 'decline'
        targetTaskId: null,
        rejectionReasonText: '',

        selectedTask: null,
        taskToDelete: null,
        isSaving: false,
        isUpdating: false,

        form: {
            title: '',
            description: '',
            project_id: '',
            gold: 100,
            assigned_to: '',
            start_date: new Date().toISOString().split('T')[0],
            deadline: ''
        },
        formErrors: {},

        editForm: {
            id: null,
            title: '',
            description: '',
            project_id: '',
            gold: 0,
            assigned_to: '',
            deadline: ''
        },

        searchQuery: '',
        filterProject: '',
        filterDepartment: '',
        filterUser: '',
        sortMode: 'manual', // 'manual' (default) | 'deadline'

        pendingTasks: @json($pendingTasks ?? []),
        completedTasks: @json($completedTasks ?? []),
        projects: @json($projects ?? []),
        users: @json($users ?? []),
        departments: @json($departments ?? []),
        isAdminOrPm: {{ $isAdminOrPm ? 'true' : 'false' }},
        currentUserId: {{ auth()->id() ?? 0 }},
        serverVersion: {{ (int) (\Illuminate\Support\Facades\Cache::get('my_tasks_last_change')['time'] ?? (int)(microtime(true)*1000)) }},
        isSyncing: false,

        realtimeAlert: {
            show: false,
            title: '',
            message: '',
            time: ''
        },

        // Google Calendar View State
        showCalendarModal: false,
        calYear: new Date().getFullYear(),
        calMonth: new Date().getMonth(), // 0 - 11
        calFilterProject: '',

        // Reassign State
        showReassignModal: false,
        taskToReassign: null,
        reassignUserId: '',
        isReassigning: false,

        toast: {
            show: false,
            message: '',
            type: 'success',
            timeout: null
        },

        init() {
            this.$nextTick(() => {
                this.initSortable();
            });

            // Kích hoạt đồng bộ Realtime thông minh (Tiết kiệm 99.9% tài nguyên host)
            this.startRealtimePolling();
        },

        openCalendarModal() {
            this.showCalendarModal = true;
        },

        closeCalendarModal() {
            this.showCalendarModal = false;
        },

        get calCurrentMonthLabel() {
            const months = [
                'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4',
                'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8',
                'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
            ];
            return `${months[this.calMonth]}, ${this.calYear}`;
        },

        calToday() {
            const now = new Date();
            this.calYear = now.getFullYear();
            this.calMonth = now.getMonth();
        },

        calPrevMonth() {
            if (this.calMonth === 0) {
                this.calMonth = 11;
                this.calYear--;
            } else {
                this.calMonth--;
            }
        },

        calNextMonth() {
            if (this.calMonth === 11) {
                this.calMonth = 0;
                this.calYear++;
            } else {
                this.calMonth++;
            }
        },

        get calDaysGrid() {
            const allTasks = [...this.pendingTasks, ...this.completedTasks].filter(t => {
                return this.calFilterProject === '' || t.project_id == this.calFilterProject;
            });

            const year = this.calYear;
            const month = this.calMonth;

            // Ngày đầu tiên của tháng
            const firstDayOfMonth = new Date(year, month, 1);
            // Chuẩn hóa sang Thứ 2 là ngày bắt đầu tuần (0..6)
            let startDay = (firstDayOfMonth.getDay() + 6) % 7;

            // Số ngày trong tháng này và tháng trước
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const daysInPrevMonth = new Date(year, month, 0).getDate();

            const today = new Date();
            const todayStr = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;

            const grid = [];

            // 1. Padding tháng trước
            for (let i = startDay - 1; i >= 0; i--) {
                const dayNum = daysInPrevMonth - i;
                const prevMonth = month === 0 ? 11 : month - 1;
                const prevYear = month === 0 ? year - 1 : year;
                const dateStr = `${prevYear}-${String(prevMonth + 1).padStart(2, '0')}-${String(dayNum).padStart(2, '0')}`;
                
                grid.push({
                    dayNumber: dayNum,
                    dateStr: dateStr,
                    isCurrentMonth: false,
                    isToday: dateStr === todayStr,
                    tasks: allTasks.filter(t => t.deadline_raw === dateStr)
                });
            }

            // 2. Các ngày trong tháng này
            for (let dayNum = 1; dayNum <= daysInMonth; dayNum++) {
                const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(dayNum).padStart(2, '0')}`;
                grid.push({
                    dayNumber: dayNum,
                    dateStr: dateStr,
                    isCurrentMonth: true,
                    isToday: dateStr === todayStr,
                    tasks: allTasks.filter(t => t.deadline_raw === dateStr)
                });
            }

            // 3. Padding tháng tiếp theo
            const remaining = (7 - (grid.length % 7)) % 7;
            const totalCells = (grid.length + remaining) < 35 ? 35 : (grid.length + remaining);
            const extraNeeded = totalCells - grid.length;

            for (let dayNum = 1; dayNum <= extraNeeded; dayNum++) {
                const nextMonth = month === 11 ? 0 : month + 1;
                const nextYear = month === 11 ? year + 1 : year;
                const dateStr = `${nextYear}-${String(nextMonth + 1).padStart(2, '0')}-${String(dayNum).padStart(2, '0')}`;

                grid.push({
                    dayNumber: dayNum,
                    dateStr: dateStr,
                    isCurrentMonth: false,
                    isToday: dateStr === todayStr,
                    tasks: allTasks.filter(t => t.deadline_raw === dateStr)
                });
            }

            return grid;
        },

        getCalTaskBadgeClass(task) {
            if (task.status === 'completed') {
                return 'bg-emerald-50 text-emerald-900 border-emerald-200 hover:bg-emerald-100';
            }
            if (task.priority === 'urgent' || this.isOverdue(task.deadline_raw)) {
                return 'bg-red-50 text-red-900 border-red-200 hover:bg-red-100';
            }
            if (task.status === 'in_progress') {
                return 'bg-amber-50 text-amber-900 border-amber-200 hover:bg-amber-100';
            }
            return 'bg-blue-50 text-blue-900 border-blue-200 hover:bg-blue-100';
        },

        getCalTaskDotClass(task) {
            if (task.status === 'completed') return 'bg-emerald-500';
            if (task.priority === 'urgent' || this.isOverdue(task.deadline_raw)) return 'bg-red-500 animate-pulse';
            if (task.status === 'in_progress') return 'bg-amber-500';
            return 'bg-blue-500';
        },

        startRealtimePolling() {
            // Đồng bộ ngay khi người dùng quay lại tab
            document.addEventListener('visibilitychange', () => {
                if (!document.hidden) {
                    this.syncRealtimeData();
                }
            });

            setInterval(async () => {
                // Tự động ngưng poll khi tab bị ẩn hoặc đang mở modal để không lãng phí CPU/băng thông
                if (document.hidden || this.isSyncing || this.isSaving || this.isUpdating || this.showModal || this.showEditModal) return;
                await this.syncRealtimeData();
            }, 4000); // 4 giây / lần (chỉ gửi 1 HTTP check nhẹ ~40 bytes từ RAM cache)
        },

        async syncRealtimeData(manual = false) {
            try {
                this.isSyncing = true;
                const v = manual ? 0 : this.serverVersion;
                const response = await fetch(`{{ route('superadmin.my-tasks.sync') }}?v=${v}`, {
                    headers: { 'Accept': 'application/json' }
                });
                if (!response.ok) return;

                const data = await response.json();
                
                // Nếu chưa có sự kiện mới: Không làm gì cả (0 DB queries, 0 DOM re-renders)
                if (!data.has_changed) {
                    return;
                }

                // Khi có sự kiện thay đổi thực tế:
                if (data.has_changed && data.pendingTasks) {
                    const lastChange = data.last_change;
                    
                    // Nếu sự kiện do PM hoặc người khác tạo ra -> cập nhật và hiện popup
                    if (lastChange && lastChange.user_id !== this.currentUserId) {
                        this.pendingTasks = data.pendingTasks;
                        this.completedTasks = data.completedTasks;

                        if (data.user_gold !== undefined) {
                            this.updateHeaderGold(data.user_gold);
                        }

                        this.triggerRealtimePopup(lastChange.message || 'Dữ liệu công việc vừa được Quản lý cập nhật!');
                    } else if (manual) {
                        this.pendingTasks = data.pendingTasks;
                        this.completedTasks = data.completedTasks;
                    }

                    if (data.server_version) {
                        this.serverVersion = data.server_version;
                    }
                }
            } catch (err) {
                // Bỏ qua lỗi kết nối nền
            } finally {
                this.isSyncing = false;
            }
        },

        triggerRealtimePopup(msg) {
            this.realtimeAlert = {
                show: true,
                title: 'Đồng bộ Thời gian thực',
                message: msg,
                time: new Date().toLocaleTimeString('vi-VN')
            };

            // Tự động ẩn popup sau 6 giây
            setTimeout(() => {
                this.realtimeAlert.show = false;
            }, 6000);
        },

        get currentProjectInfo() {
            if (!this.form.project_id) return null;
            return this.projects.find(p => p.id == this.form.project_id) || null;
        },

        updateHeaderGold(newGoldVal) {
            const el = document.getElementById('user-header-gold-val');
            if (el && newGoldVal !== undefined) {
                el.innerText = Number(newGoldVal).toLocaleString('vi-VN');
            }
        },

        showToast(message, type = 'success') {
            this.toast.message = message;
            this.toast.type = type;
            this.toast.show = true;
            if (this.toast.timeout) clearTimeout(this.toast.timeout);
            this.toast.timeout = setTimeout(() => {
                this.toast.show = false;
            }, 3000);
        },

        get filteredPendingTasks() {
            let filtered = this.pendingTasks.filter(t => {
                const matchSearch = t.title.toLowerCase().includes(this.searchQuery.toLowerCase())
                    || (t.assignee_name && t.assignee_name.toLowerCase().includes(this.searchQuery.toLowerCase()));
                const matchProject = this.filterProject === '' || t.project_id == this.filterProject;
                const matchDepartment = this.filterDepartment === '' || t.assignee_department === this.filterDepartment;
                const matchUser = this.filterUser === '' || t.assigned_to == this.filterUser || t.user_id == this.filterUser;
                return matchSearch && matchProject && matchDepartment && matchUser;
            });

            if (this.sortMode === 'deadline') {
                filtered.sort((a, b) => {
                    const diffA = this.daysLeft(a.deadline_raw);
                    const diffB = this.daysLeft(b.deadline_raw);
                    if (diffA === null && diffB === null) return 0;
                    if (diffA === null) return 1;
                    if (diffB === null) return -1;
                    return diffA - diffB;
                });
            } else {
                // Sắp xếp "Quan trọng" (Mặc định):
                // Ưu tiên cao nhất:
                // 1. Việc mới / Vừa được điều phối lại (acceptance_status === 'pending')
                // 2. Việc bị từ chối cần Quản lý điều phối lại (acceptance_status === 'rejected' || approval_status === 'rejected')
                // 3. Xếp theo thứ tự kéo thả (position)
                filtered.sort((a, b) => {
                    const getPriorityScore = (t) => {
                        if (t.acceptance_status === 'pending') return 3; // Việc mới / Điều phối lại lên đầu tiên
                        if (t.acceptance_status === 'rejected' || t.approval_status === 'rejected') return 2; // Cần điều phối lại
                        return 1; // Công việc bình thường
                    };

                    const scoreA = getPriorityScore(a);
                    const scoreB = getPriorityScore(b);

                    if (scoreA !== scoreB) {
                        return scoreB - scoreA;
                    }

                    return (a.position || 0) - (b.position || 0);
                });
            }

            return filtered;
        },

        get filteredCompletedTasks() {
            return this.completedTasks.filter(t => {
                const matchSearch = t.title.toLowerCase().includes(this.searchQuery.toLowerCase())
                    || (t.assignee_name && t.assignee_name.toLowerCase().includes(this.searchQuery.toLowerCase()));
                const matchProject = this.filterProject === '' || t.project_id == this.filterProject;
                return matchSearch && matchProject;
            });
        },

        daysLeft(deadlineRaw) {
            if (!deadlineRaw) return null;
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const due = new Date(deadlineRaw);
            due.setHours(0, 0, 0, 0);
            return Math.ceil((due - today) / (1000 * 60 * 60 * 24));
        },

        isOverdue(deadlineRaw) {
            const diff = this.daysLeft(deadlineRaw);
            return diff !== null && diff < 0;
        },

        isNearDue(deadlineRaw) {
            const diff = this.daysLeft(deadlineRaw);
            return diff !== null && diff >= 0 && diff <= 2;
        },

        formatDateShort(dateStr) {
            if (!dateStr) return '';
            // Nếu chuỗi dạng YYYY-MM-DD
            if (dateStr.includes('-')) {
                const parts = dateStr.split('-');
                if (parts.length === 3) return `${parts[2]}/${parts[1]}`;
            }
            // Nếu chuỗi dạng DD/MM/YYYY hoặc DD/MM
            if (dateStr.includes('/')) {
                const parts = dateStr.split('/');
                if (parts.length >= 2) return `${parts[0]}/${parts[1]}`;
            }
            return dateStr;
        },

        openModal() {
            this.form = {
                title: '',
                description: '',
                project_id: this.projects.length > 0 ? this.projects[0].id : '',
                gold: 100,
                assigned_to: '',
                start_date: new Date().toISOString().split('T')[0],
                deadline: ''
            };
            this.formErrors = {};
            this.showModal = true;
        },

        closeModal() {
            this.showModal = false;
        },

        openEditModal(task) {
            this.editForm = {
                id: task.id,
                title: task.title,
                description: task.description || '',
                project_id: task.project_id,
                gold: task.gold || 0,
                assigned_to: task.assigned_to || '',
                deadline: task.deadline_raw || ''
            };
            this.showEditModal = true;
        },

        closeEditModal() {
            this.showEditModal = false;
        },

        openDetailModal(task) {
            this.selectedTask = task;
            this.showDetailModal = true;
        },

        closeDetailModal() {
            this.showDetailModal = false;
            this.selectedTask = null;
        },

        openDeleteModal(task) {
            this.taskToDelete = task;
            this.showDeleteModal = true;
        },

        closeDeleteModal() {
            this.showDeleteModal = false;
            this.taskToDelete = null;
        },

        async saveTask() {
            this.isSaving = true;
            this.formErrors = {};

            try {
                const response = await fetch('{{ route('superadmin.my-tasks.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(this.form)
                });

                const data = await response.json();

                if (!response.ok) {
                    if (response.status === 422 && data.errors) {
                        this.formErrors = Object.fromEntries(
                            Object.entries(data.errors).map(([k, v]) => [k, v[0]])
                        );
                    } else {
                        this.showToast(data.message || 'Có lỗi xảy ra khi tạo công việc.', 'error');
                    }
                    return;
                }

                if (data.success && data.task) {
                    this.pendingTasks.push(data.task);
                    this.closeModal();
                    this.showToast(data.message || 'Đã tạo công việc thành công!');
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối đến máy chủ.', 'error');
            } finally {
                this.isSaving = false;
            }
        },

        async updateTask() {
            this.isUpdating = true;
            try {
                const response = await fetch(`{{ url('superadmin/my-tasks') }}/${this.editForm.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(this.editForm)
                });

                const data = await response.json();

                if (!response.ok) {
                    this.showToast(data.message || 'Có lỗi xảy ra khi cập nhật.', 'error');
                    return;
                }

                if (data.success && data.task) {
                    this.pendingTasks = this.pendingTasks.filter(t => t.id !== data.task.id);
                    this.pendingTasks.unshift(data.task);
                    this.closeEditModal();
                    this.showToast('Đã cập nhật công việc thành công!');
                    await this.syncRealtimeData(true);
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối đến máy chủ.', 'error');
            } finally {
                this.isUpdating = false;
            }
        },

        async confirmDeleteTask() {
            if (!this.taskToDelete) return;
            const taskId = this.taskToDelete.id;

            try {
                const response = await fetch(`{{ url('superadmin/my-tasks') }}/${taskId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    this.pendingTasks = this.pendingTasks.filter(t => t.id !== taskId);
                    this.completedTasks = this.completedTasks.filter(t => t.id !== taskId);
                    this.closeDeleteModal();
                    this.showToast('Đã xóa công việc thành công!');
                } else {
                    this.showToast(data.message || 'Không thể xóa công việc.', 'error');
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối đến máy chủ.', 'error');
            }
        },

        async approveTask(taskId) {
            try {
                const response = await fetch(`{{ url('superadmin/my-tasks') }}/${taskId}/approve`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const data = await response.json();
                if (data.success && data.task) {
                    const idx = this.pendingTasks.findIndex(t => t.id === taskId);
                    if (idx !== -1) this.pendingTasks[idx] = data.task;
                    this.showToast('Đã duyệt công việc!');
                } else {
                    this.showToast(data.message || 'Lỗi khi duyệt task.', 'error');
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối máy chủ.', 'error');
            }
        },

        openRejectApprovalModal(task) {
            this.targetTaskId = task.id;
            this.reasonActionType = 'reject_approval';
            this.reasonModalTitle = 'Từ chối duyệt công việc';
            this.rejectionReasonText = '';
            this.showReasonModal = true;
        },

        async acceptTask(taskId) {
            try {
                const response = await fetch(`{{ url('superadmin/my-tasks') }}/${taskId}/accept`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const data = await response.json();
                if (data.success && data.task) {
                    const idx = this.pendingTasks.findIndex(t => t.id === taskId);
                    if (idx !== -1) this.pendingTasks[idx] = data.task;
                    this.showToast('Đã nhận việc thành công!');
                } else {
                    this.showToast(data.message || 'Lỗi khi nhận việc.', 'error');
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối máy chủ.', 'error');
            }
        },

        openDeclineModal(task) {
            this.targetTaskId = task.id;
            this.reasonActionType = 'decline';
            this.reasonModalTitle = 'Từ chối nhận công việc';
            this.rejectionReasonText = '';
            this.showReasonModal = true;
        },

        async submitReasonAction() {
            if (!this.targetTaskId) return;
            const url = this.reasonActionType === 'reject_approval'
                ? `{{ url('superadmin/my-tasks') }}/${this.targetTaskId}/reject-approval`
                : `{{ url('superadmin/my-tasks') }}/${this.targetTaskId}/decline`;

            try {
                const response = await fetch(url, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ reason: this.rejectionReasonText })
                });
                const data = await response.json();
                if (data.success && data.task) {
                    const idx = this.pendingTasks.findIndex(t => t.id === this.targetTaskId);
                    if (idx !== -1) this.pendingTasks[idx] = data.task;
                    this.showReasonModal = false;
                    this.showToast(data.message || 'Đã thực hiện thành công!');
                } else {
                    this.showToast(data.message || 'Có lỗi xảy ra.', 'error');
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối máy chủ.', 'error');
            }
        },

        openReassignModal(task) {
            this.taskToReassign = task;
            this.reassignUserId = '';
            this.showReassignModal = true;
        },

        closeReassignModal() {
            this.showReassignModal = false;
            this.taskToReassign = null;
            this.reassignUserId = '';
        },

        async submitReassignTask() {
            if (!this.taskToReassign || !this.reassignUserId) return;
            try {
                this.isReassigning = true;
                const response = await fetch(`{{ url('superadmin/my-tasks') }}/${this.taskToReassign.id}/reassign`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        assigned_to: this.reassignUserId
                    })
                });

                const data = await response.json();
                if (data.success && data.task) {
                    this.showToast(data.message, 'success');
                    this.closeReassignModal();
                    const idx = this.pendingTasks.findIndex(t => t.id === data.task.id);
                    if (idx !== -1) {
                        this.pendingTasks[idx] = data.task;
                    } else {
                        this.pendingTasks.unshift(data.task);
                    }
                    await this.syncRealtimeData(true);
                } else {
                    this.showToast(data.message || 'Lỗi điều phối lại công việc.', 'error');
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối máy chủ.', 'error');
            } finally {
                this.isReassigning = false;
            }
        },

        async completeTask(taskId) {
            try {
                const response = await fetch(`{{ url('superadmin/my-tasks') }}/${taskId}/complete`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const data = await response.json();
                if (data.success) {
                    const task = this.pendingTasks.find(t => t.id === taskId);
                    if (task) {
                        this.pendingTasks = this.pendingTasks.filter(t => t.id !== taskId);
                        task.completed_at = new Date().toLocaleString('vi-VN');
                        task.gold_awarded = false; // Chưa trao gold ngay
                        this.completedTasks.unshift(data.task || task);
                    }
                    this.showToast(data.message || 'Đã báo cáo hoàn thành! Chờ Quản lý duyệt Gold.');
                } else {
                    this.showToast(data.message || 'Lỗi khi hoàn thành.', 'error');
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối máy chủ.', 'error');
            }
        },

        async approveGold(taskId) {
            try {
                const response = await fetch(`{{ url('superadmin/my-tasks') }}/${taskId}/approve-gold`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const data = await response.json();
                if (data.success && data.task) {
                    const idx = this.completedTasks.findIndex(t => t.id === taskId);
                    if (idx !== -1) {
                        this.completedTasks[idx] = data.task;
                    }
                    if (data.user_gold !== undefined) {
                        this.updateHeaderGold(data.user_gold);
                    }
                    this.showToast(data.message || 'Đã duyệt nghiệm thu và trao Gold thành công!');
                } else {
                    this.showToast(data.message || 'Có lỗi xảy ra khi duyệt Gold.', 'error');
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối máy chủ.', 'error');
            }
        },

        async restoreTask(taskId) {
            try {
                const response = await fetch(`{{ url('superadmin/my-tasks') }}/${taskId}/restore`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const data = await response.json();
                if (data.success && data.task) {
                    this.completedTasks = this.completedTasks.filter(t => t.id !== taskId);
                    this.pendingTasks.push(data.task);
                    if (data.user_gold !== undefined) {
                        this.updateHeaderGold(data.user_gold);
                    }
                    this.showToast(data.message || 'Đã khôi phục công việc!');
                } else {
                    this.showToast(data.message || 'Lỗi khi khôi phục.', 'error');
                }
            } catch (err) {
                console.error(err);
                this.showToast('Không thể kết nối máy chủ.', 'error');
            }
        },

        initSortable() {
            const grid = document.getElementById('tasks-grid');
            if (!grid) return;

            new Sortable(grid, {
                animation: 150,
                ghostClass: 'task-ghost',
                fallbackClass: 'task-fallback',
                forceFallback: true,
                onEnd: async (evt) => {
                    const items = Array.from(grid.querySelectorAll('[data-task-id]'))
                        .map(el => parseInt(el.getAttribute('data-task-id')));

                    // Cập nhật vị trí trực tiếp trên state Alpine ngay lập tức
                    items.forEach((id, idx) => {
                        const t = this.pendingTasks.find(item => item.id === id);
                        if (t) t.position = idx + 1;
                    });

                    this.lastSyncedTime = Date.now();

                    try {
                        const response = await fetch('{{ route('superadmin.my-tasks.reorder') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ items })
                        });
                        const data = await response.json();
                        if (data.success) {
                            this.showToast('Đã cập nhật thứ tự công việc & đồng bộ Realtime!');
                        }
                    } catch (e) {
                        console.error(e);
                    }
                }
            });
        }
    }));
});
</script>
@endpush
