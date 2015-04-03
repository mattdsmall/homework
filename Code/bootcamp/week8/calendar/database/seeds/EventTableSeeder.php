<?php
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Event;
class EventTableSeeder extends Seeder {
    public function run()
    {
        DB::table('events')->delete();
        Event::create(
            [
                'title' => 'Test Title',
                'isAllDay' => false,
                'start' => Carbon::yesterday(),
                'end' => Carbon::tomorrow()
            ]);
        Event::create(
            [
                'title' => 'Test Title 2',
                'isAllDay' => false,
                'start' => Carbon::yesterday(),
                'end' => Carbon::tomorrow()
            ]);
         Event::create(
            [
                'title' => 'Test Title 3',
                'isAllDay' => true,
                'start' => Carbon::tomorrow(),
                'end' => Carbon::create(date('Y'), date('n') + 1, 1)
            ]);
    }
}