<?php

namespace MrShaneBarron\Share\Livewire;

use Livewire\Component;

class Share extends Component
{
    public string $url = '';
    public string $title = '';
    public string $text = '';
    public array $networks = ['twitter', 'facebook', 'linkedin', 'email'];
    public string $size = 'md';
    public string $style = 'buttons';

    public function mount(
        string $url = '',
        string $title = '',
        string $text = '',
        array $networks = ['twitter', 'facebook', 'linkedin', 'email'],
        string $size = 'md',
        string $style = 'buttons'
    ): void {
        $this->url = $url ?: url()->current();
        $this->title = $title;
        $this->text = $text;
        $this->networks = $networks;
        $this->size = $size;
        $this->style = $style;
    }

    public function getShareUrl(string $network): string
    {
        $encodedUrl = urlencode($this->url);
        $encodedTitle = urlencode($this->title);
        $encodedText = urlencode($this->text);

        return match($network) {
            'twitter' => "https://twitter.com/intent/tweet?url={$encodedUrl}&text={$encodedTitle}",
            'facebook' => "https://www.facebook.com/sharer/sharer.php?u={$encodedUrl}",
            'linkedin' => "https://www.linkedin.com/sharing/share-offsite/?url={$encodedUrl}",
            'email' => "mailto:?subject={$encodedTitle}&body={$encodedText}%20{$encodedUrl}",
            'whatsapp' => "https://wa.me/?text={$encodedTitle}%20{$encodedUrl}",
            'telegram' => "https://t.me/share/url?url={$encodedUrl}&text={$encodedTitle}",
            default => '#',
        };
    }

    public function render()
    {
        return view('ld-share::livewire.share');
    }
}
