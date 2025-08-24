<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Seat;
use App\Models\Customer;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\QuestionCategory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Total feedback
        $totalFeedback = Feedback::count();

        // Feedback yang masuk hari ini
        $todayFeedback = Feedback::with(['customer', 'seat'])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->get();

        // Total Kategori Pertanyaan
        $totalCategory = QuestionCategory::count();

        // Grafik: Feedback per rating


        // Total Customer
        $totalCustomer = Customer::count();

        return view('dashboard.main', compact(
            'totalFeedback',
            'todayFeedback',
            'totalCategory',
            'totalCustomer',
        ));
    }
}
