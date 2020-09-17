<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $text;
    
    public $channel;
    
    private $files;
    public function __construct($text, $channel, $files = [])
    {
         $this->text = $text;
        $this->channel = $channel;
        $this->files = $files;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel($this->channel);
    }

    //  public function broadcastAs()
    // {
    //     return 'UserEvent';
    // }
    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastWith()
    {
       return [
            'text'       => $this->text,
            'sender'     => Auth::user(),
            'files'      => $this->files,
            'created_at' => now(),
        ];
    }
}
