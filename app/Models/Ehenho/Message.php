<?php

declare(strict_types=1);

namespace App\Models\Ehenho;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends EhenhoBaseModel
{
    protected $table = 'messages';

    protected $fillable = [
        'project_id',
        'conversation_id',
        'sender_id',
        'recipient_id',
        'subject',
        'body',
        'is_read',
        'read_at',
    ];

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
            'read_at' => 'datetime',
        ];
    }

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
