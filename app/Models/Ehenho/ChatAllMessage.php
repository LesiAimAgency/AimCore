<?php

declare(strict_types=1);

namespace App\Models\Ehenho;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatAllMessage extends EhenhoBaseModel
{
    protected $table = 'chat_all_messages';

    protected $fillable = [
        'project_id',
        'user_id',
        'message',
        'attachment_url',
        'attachment_type',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getSenderNameAttribute(): string
    {
        return $this->user?->profile?->display_name ?: ($this->user?->name ?: 'Thành viên');
    }

    public function getSenderAvatarAttribute(): string
    {
        $profile = $this->user?->profile;
        if ($profile && ! empty($profile->avatar_url)) {
            return asset($profile->avatar_url);
        }

        if ($this->user && ! empty($this->user->avatar)) {
            return asset($this->user->avatar);
        }

        return asset('themes/ehenho/images/df_picture.png');
    }
}
