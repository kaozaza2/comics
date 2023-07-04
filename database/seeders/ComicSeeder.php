<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->first();

        if (! $user) {
            $user = User::factory()->create();
        }

        /** @var Comic $comic */
        $comic = Comic::factory()->create();

        $cover = Storage::putFileAs(
            $comic->slug,
            UploadedFile::fake()->image('cover.jpg', 500, 750),
            'cover_'.Str::random().'.jpg'
        );
        $thumb = Storage::putFileAs(
            $comic->slug,
            UploadedFile::fake()->image('thumb.jpg', 250, 375),
            'thumb_'.Str::random().'.jpg'
        );

        $comic->forceFill([
            'cover_path' => $cover,
            'thumb_path' => $thumb,
        ])->save();

        $comic->users()->attach($user, ['role' => 'owner']);

        Chapter::factory()
            ->count(5)
            ->sequence(
                ...array_map(fn ($page) => [
                    'episode' => $page,
                    'order_column' => $page,
                    'pages' => array_map(
                        fn ($i) => Storage::putFileAs(
                            $comic->slug.'/pages/'.str_pad($page, 4, '0', 0),
                            UploadedFile::fake()->image('file.jpg', 500, 750),
                            str_pad($i, 4, '0', 0).'_'.str_pad($page, 4, '0', 0).'_'.Str::random().'.jpg',
                        ),
                        range(1, 10)
                    ),
                    'thumb_path' => Storage::putFileAs(
                        $comic->slug.'/page_thumbs',
                        UploadedFile::fake()->image('thumb.jpg', 250, 375),
                        'thumb_'.str_pad($page, 4, '0', 0).'_'.Str::random().'.jpg',
                    ),
                ], range(1, 5))
            )
            ->state([
                'comic_id' => $comic->id,
            ])
            ->create();
    }
}
