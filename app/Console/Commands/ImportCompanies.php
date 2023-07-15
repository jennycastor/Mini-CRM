<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Company;

class ImportCompanies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:companies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import companies from an external URL';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'https://raw.githubusercontent.com/dariusk/corpora/master/data/corporations/fortune500.json';

        $response = Http::get($url);

        if ($response->ok()) {
            $companies = $response->json();

            if (is_array($companies)) { // Check if $companies is an array
                foreach ($companies as $companyData) {
                    Company::create([
                        'name' => $companyData['company'],
                        'email' => $companyData['email'],
                        'logo' => null, // Set the logo path or URL here
                        'website' => $companyData['website'],
                    ]);
                }

                $this->info('Companies imported successfully.');
            } else {
                $this->error('Failed to fetch companies from the external URL.');
            }
        } else {
            $this->error('Failed to fetch companies from the external URL.');
        }

        return 0;
    }
}
