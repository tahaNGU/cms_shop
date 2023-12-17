<?php

namespace App\Http\Middleware\admin;

use App\Models\admin\group_access;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin_access
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $modules = ['banner', 'article_cat', 'article', 'page', 'menu', 'faq'];
        $crud = ['create', 'update', 'delete', 'action_items'];
        foreach ($modules as $module) {
            foreach ($crud as $item) {
                $is_row = group_access::where('namespace', 'admin.' . $module . '.' . $item)->count();
                if (!$is_row) {

                    group_access::create([
                        'module' => $module,
                        'namespace' => 'admin.' . $module . '.' . $item
                    ]);
                }
            }
        }
        return $next($request);
    }
}
