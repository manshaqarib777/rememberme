<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class YouTubeLink implements ValidationRule
{
    protected $videoId;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Regular expression to match YouTube video URLs and extract the video ID
        $pattern = '/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/';

        if (preg_match($pattern, $value)) {
            parse_str(parse_url($value, PHP_URL_QUERY), $queryParams);

            if (isset($queryParams['v'])) {
                $this->videoId = $queryParams['v'];
                return;
            } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $value, $matches)) {
                $this->videoId = $matches[1];
                return;
            }
        }

        $fail('The :attribute must be a valid YouTube URL with a video ID.');
    }

    /**
     * Get the extracted YouTube video ID.
     *
     * @return string|null
     */
    public function getVideoId(): ?string
    {
        return $this->videoId;
    }
}
