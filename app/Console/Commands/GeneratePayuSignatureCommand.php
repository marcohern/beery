<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GeneratePayuSignatureCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payu:gen {txValue} {refCode}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $rand = rand();
        $apiKey     = config('payu.apiKey');
        $merchantId = config('payu.merchantId');
        $accountId  = config('payu.accountId');
        $txValue    = $this->argument('txValue');
        $currency   = config('payu.currency');
        $refCode    = $this->argument('refCode').$rand;
        $secret     = "$apiKey~$merchantId~$refCode~$txValue~$currency";
        $signature  = md5($secret);
        $sha        = sha1($secret);

        echo "apiKey    : $apiKey\n";
        echo "merchantId: $merchantId\n";
        echo "accountId : $accountId\n";
        echo "txValue   : $txValue\n";
        echo "currency  : $currency\n";
        echo "refCode   : $refCode\n";
        echo "signature (md5)  : $signature\n";
        echo "signature (sha1) : $sha\n";
        return 0;
    }
}
