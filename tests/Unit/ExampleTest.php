<?php

namespace Tests\Unit;

use App\Repositories\Local\OrderRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {

        $this->assertFalse(false);
    }
}
