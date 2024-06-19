<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class RecordVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $ipAddress = $request->ip();

        // Catat pengunjung jika belum ada catatan dengan IP tersebut pada hari ini
        if (!Visitor::where('ip_address', $ipAddress)->whereDate('created_at', today())->exists()) {
            Visitor::create(['ip_address' => $ipAddress]);
        }

        return $next($request);
    }
}
