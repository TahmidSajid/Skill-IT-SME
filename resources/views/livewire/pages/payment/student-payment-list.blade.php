<div>
    <div class="row">
        <div class="col-lg-4 offset-lg-8">
            <div class="input-group mb-4">
                <input class="form-control border-end-0 border" type="search" wire:model.live="search" value="search"
                    id="example-search-input" placeholder="search here....">
                <span class="input-group-append bg-transparent">
                    <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5"
                        type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>Student name</th>
                                    <th>Phone</th>
                                    <th>Course Name</th>
                                    <th>Payment</th>
                                    @if (auth()->user()->role == 'admin')
                                        <th>Action</th>
                                    @endIf
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->students as $key => $student)
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <div class="productimgname">
                                                @if ($student->getStudent->photo)
                                                    <img style="height: 50px; width:50px;" src="{{ asset('uploads/student_photos') }}/{{ $student->getStudent->photo }}"
                                                        alt="">
                                                @else
                                                    <img style="height: 50px; width:50px;" src="{{ asset('default_photos/default_profile.png') }}"
                                                        alt="">
                                                @endif
                                                {{ $student->getStudent->name }}
                                            </div>
                                        </td>
                                        <td>{{ $student->getStudent->phone }}</td>
                                        <td>{{ $student->getCourse->course_name }}</td>
                                        <td>
                                            @if ($student->payment == 'due')
                                                <span class="bg-lightyellow badges">{{ $student->payment }}</span>
                                            @else
                                                <span class="bg-lightgreen badges">{{ $student->payment }}</span>
                                            @endif
                                        </td>
                                        @if (auth()->user()->role == 'admin')
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <a class="me-3 confirm-text btn btn-sm btn-info text-white"
                                                            href="{{ route('individual_payment', [$student->course_id, $student->getStudent]) }}">
                                                            Payment Management
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button class="me-3 btn btn-sm btn-danger text-white" wire:click="expel({{ $student->id }})" wire:click="$refresh">
                                                            Expel
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <h4>Nothing</h4>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
