<?php

namespace App\Console\Commands;

use App\Events\MailUsersEvent;
use Illuminate\Console\Command;

class EMailUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:users {tenantId: id of tenant} {title: Title of post} {post: Post details}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to all tenant sunscribers @params tenantId,title, post';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ## Dispatch event
        MailUsersEvent::dispatch($this->arguments()['tenantId'], $this->arguments()['title'], $this->arguments()['post']);
        return 'Emails sent';
    }
}
