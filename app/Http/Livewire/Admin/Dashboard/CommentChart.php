<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Comment;
use Livewire\Component;

class CommentChart extends Component
{
    public $unApproved = 0;

    public $approved = 0;

    public $users = 0;

    public $managers = 0;

    public function mount()
    {
        $this->unApproved = Comment::whereApproved(0)->count();

        $this->approved = Comment::whereApproved(1)->count();

        $this->users = Comment::whereNull('parent_id')->count();

        $this->managers = Comment::whereNotNull('parent_id')->count();
    }

    public function render()
    {
        return <<<'blade'
            <div class="col-span-4 md:col-span-2 py-4">
                <div class="text-xl mb-7 text-gray-500 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 459.75 459.75" fill="currentColor" class="w-5 h-5 ml-2" xml:space="preserve">
                        <g><path d="M447.652,304.13h-40.138c-6.681,0-12.097,5.416-12.097,12.097v95.805c0,6.681,5.416,12.098,12.097,12.098h40.138   c6.681,0,12.098-5.416,12.098-12.098v-95.805C459.75,309.546,454.334,304.13,447.652,304.13z"/><path d="M348.798,258.13H308.66c-6.681,0-12.098,5.416-12.098,12.097v141.805c0,6.681,5.416,12.098,12.098,12.098h40.138   c6.681,0,12.097-5.416,12.097-12.098V270.228C360.896,263.546,355.48,258.13,348.798,258.13z"/><path d="M151.09,304.13h-40.138c-6.681,0-12.097,5.416-12.097,12.097v95.805c0,6.681,5.416,12.098,12.097,12.098h40.138   c6.681,0,12.098-5.416,12.098-12.098v-95.805C163.188,309.546,157.771,304.13,151.09,304.13z"/><path d="M52.236,258.13H12.098C5.416,258.13,0,263.546,0,270.228v141.805c0,6.681,5.416,12.098,12.098,12.098h40.138   c6.681,0,12.097-5.416,12.097-12.098V270.228C64.333,263.546,58.917,258.13,52.236,258.13z"/><path d="M249.944,196.968h-40.138c-6.681,0-12.098,5.416-12.098,12.098v202.967c0,6.681,5.416,12.098,12.098,12.098h40.138   c6.681,0,12.098-5.416,12.098-12.098V209.066C262.042,202.384,256.625,196.968,249.944,196.968z"/><path d="M436.869,244.62c8.14,0,15-6.633,15-15v-48.479c0-8.284-6.716-15-15-15c-8.284,0-15,6.716-15,15v12.119L269.52,40.044   c-3.148-3.165-7.536-4.767-11.989-4.362c-4.446,0.403-8.482,2.765-11.011,6.445L131.745,209.185L30.942,144.969   c-6.987-4.451-16.26-2.396-20.71,4.592c-4.451,6.987-2.396,16.259,4.592,20.71l113.021,72c2.495,1.589,5.286,2.351,8.046,2.351   c4.783,0,9.475-2.285,12.376-6.507L261.003,74.025L400.8,214.62h-12.41c-8.284,0-15,6.716-15,15c0,8.284,6.716,15,15,15   c6.71,0,41.649,0,48.443,0H436.869z"/></g>
                    </svg>
                    کامنت
                </div>

                <canvas id="myCommentChart" height="150"></canvas>

                <script>
                    document.addEventListener('DOMContentLoaded', () => {
            
                        const ctx = document.getElementById('myCommentChart').getContext('2d');
            
                        Chart.defaults.font.family = 'Vazir';
            
                        const myCommentChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['تایید نشده', 'تایید شده', 'کاربران', 'مدیریت'],
                                datasets: [{
                                    label: '# of Votes',
                                    data: [@this.unApproved, @this.approved, @this.users, @this.managers],
                                    backgroundColor: [
                                        '#01579b',
                                        '#0288d1',
                                        '#29b6f6',
                                        '#81d4fa',
                                    ],
                                    borderColor: [
                                        '#01579b',
                                        '#0288d1',
                                        '#29b6f6',
                                        '#81d4fa',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                        });
                    })
                </script>
            </div>
        blade;
    }
}
