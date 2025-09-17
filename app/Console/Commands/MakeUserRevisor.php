<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-user-revisor 
                            {email : L\'email dell\'utente} 
                            {--revoke : Rimuove lo status di revisore}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rende un utente revisore o rimuove lo status di revisore con --revoke';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if (!$user) {
            $this->error('Utente non trovato');
            return;
        }

        if ($this->option('revoke')) {
            if (!$user->is_revisor) {
                $this->warn("L'utente {$user->name} non e' revisore");
                return;
            }
            $user->is_revisor = false;
            $user->save();
            $this->info("Lo status di revisore dell'utente {$user->name} è stato rimosso");
        } else {
            if ($user->is_revisor) {
                $this->warn("L'utente {$user->name} è già revisore");
                return;
            }
            $user->is_revisor = true;
            $user->save();
            $this->info("L'utente {$user->name} e' ora revisore");
        }
    }
}
