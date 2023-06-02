<?php

namespace Sticket\Src\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sticket\Src\Enums\TicketStatus;
use Sticket\Src\Enums\TicketPriority;

class Ticket extends Model
{
    use HasFactory;

    // protected $appends = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getStatusColorAttribute(){
        return TicketStatus::from($this->status)->color();
    }

    public function getPriorityColorAttribute(){
        return TicketPriority::from($this->priority)->color();
    }

    public function getPriorityTextAttribute(){
        return TicketPriority::from($this->priority)->value;
    }
}
