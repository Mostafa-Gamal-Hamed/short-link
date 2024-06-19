<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/qrcode'))
            ->add(Url::create('/shorten'))
            ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap has been generated.');

        return 0;
    }
}
