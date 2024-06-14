@extends('layouts.template')

@section('content')
<section class="section__container price__container" id="plans">
    <h2 class="section__header">Create Your Plan</h2>
    <div class="container">
        <form action="{{ route('plans.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Plan Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Plan Description</label>
                <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="duration" class="form-label">Plan Duration (months)</label>
                <input type="number" id="duration" name="duration" class="form-control" value="{{ old('duration') }}" required>
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

            <div id="exercise-container">
                @if(old('exercises'))
                    @foreach(old('exercises') as $index => $exercise)
                        <div class="form-group exercise">
                            <label for="exercise-{{ $index }}" class="form-label">Exercise {{ $index + 1 }}</label>
                            <select id="exercise-{{ $index }}" name="exercises[{{ $index }}][id]" class="form-select" required>
                                @foreach($exercises as $exerciseOption)
                                    <option value="{{ $exerciseOption->id }}" {{ $exerciseOption->id == $exercise['id'] ? 'selected' : '' }}>{{ $exerciseOption->name }}</option>
                                @endforeach
                            </select>
                            <div class="row mt-2">
                                <div class="col">
                                    <label for="reps-{{ $index }}" class="form-label">Reps</label>
                                    <input type="number" id="reps-{{ $index }}" name="exercises[{{ $index }}][reps]" class="form-control" value="{{ $exercise['reps'] }}" required>
                                </div>
                                <div class="col">
                                    <label for="sets-{{ $index }}" class="form-label">Sets</label>
                                    <input type="number" id="sets-{{ $index }}" name="exercises[{{ $index }}][sets]" class="form-control" value="{{ $exercise['sets'] }}" required>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="mb-3 exercise">
                        <label for="exercise-1" class="form-label">Exercise 1</label>
                        <select id="exercise-1" name="exercises[0][id]" class="form-select" required>
                            @foreach($exercises as $exercise)
                                <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                            @endforeach
                        </select>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="reps-1" class="form-label">Reps</label>
                                <input type="number" id="reps-1" name="exercises[0][reps]" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="sets-1" class="form-label">Sets</label>
                                <input type="number" id="sets-1" name="exercises[0][sets]" class="form-control" required>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <button type="button" id="add-exercise" class="btn btn-secondary mb-3">Add Exercise</button>
            <button type="submit" class="btn btn-primary mb-3">Create Plan</button>
        </form>
    </div>
</section>

<script>
    document.getElementById('add-exercise').addEventListener('click', function() {
        var exerciseContainer = document.getElementById('exercise-container');
        var exerciseCount = exerciseContainer.getElementsByClassName('exercise').length;

        var newExercise = document.createElement('div');
        newExercise.className = 'mb-3 exercise';

        var newLabel = document.createElement('label');
        newLabel.htmlFor = 'exercise-' + (exerciseCount + 1);
        newLabel.textContent = 'Exercise ' + (exerciseCount + 1);
        newLabel.className = 'form-label';

        var newSelect = document.createElement('select');
        newSelect.id = 'exercise-' + (exerciseCount + 1);
        newSelect.name = 'exercises[' + exerciseCount + '][id]';
        newSelect.className = 'form-select';
        newSelect.required = true;

        @foreach($exercises as $exercise)
            var option = document.createElement('option');
            option.value = "{{ $exercise->id }}";
            option.textContent = "{{ $exercise->name }}";
            newSelect.appendChild(option);
        @endforeach

        var repsLabel = document.createElement('label');
        repsLabel.htmlFor = 'reps-' + (exerciseCount + 1);
        repsLabel.textContent = 'Reps';
        repsLabel.className = 'form-label';

        var repsInput = document.createElement('input');
        repsInput.type = 'number';
        repsInput.id = 'reps-' + (exerciseCount + 1);
        repsInput.name = 'exercises[' + exerciseCount + '][reps]';
        repsInput.className = 'form-control';
        repsInput.required = true;

        var setsLabel = document.createElement('label');
        setsLabel.htmlFor = 'sets-' + (exerciseCount + 1);
        setsLabel.textContent = 'Sets';
        setsLabel.className = 'form-label';

        var setsInput = document.createElement('input');
        setsInput.type = 'number';
        setsInput.id = 'sets-' + (exerciseCount + 1);
        setsInput.name = 'exercises[' + exerciseCount + '][sets]';
        setsInput.className = 'form-control';
        setsInput.required = true;

        var rowDiv = document.createElement('div');
        rowDiv.className = 'row mt-2';

        var colDiv1 = document.createElement('div');
        colDiv1.className = 'col';

        var colDiv2 = document.createElement('div');
        colDiv2.className = 'col';

        colDiv1.appendChild(repsLabel);
        colDiv1.appendChild(repsInput);

        colDiv2.appendChild(setsLabel);
        colDiv2.appendChild(setsInput);

        rowDiv.appendChild(colDiv1);
        rowDiv.appendChild(colDiv2);

        newExercise.appendChild(newLabel);
        newExercise.appendChild(newSelect);
        newExercise.appendChild(rowDiv);

        exerciseContainer.appendChild(newExercise);
    });
</script>
@endsection
