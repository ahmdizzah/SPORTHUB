@extends('dashboard.layouts.template')

@section('content')
<div class="container-fluid">
    <a href="{{ route('plans.index') }}" class="btn btn-primary">Back</a>
    <div class="card shadow my-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Plan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-label">Plan Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $plan->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required>{{ old('description', $plan->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="number" id="duration" name="duration" class="form-control" value="{{ old('duration', $plan->duration) }}" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if($plan->image)
                        <img src="{{ asset('assets/images/plans/' . $plan->image) }}" alt="Plan Image" class="img-fluid mt-2">
                    @endif
                </div>

                <div id="exercise-container">
                    @foreach($plan->programs as $index => $program)
                    <div class="mb-3 exercise">
                        <label for="exercise-{{ $index }}" class="form-label">Exercise {{ $index + 1 }}</label>
                        <select id="exercise-{{ $index }}" name="exercises[{{ $index }}][id]" class="form-select" required>
                            @foreach($exercises as $exercise)
                            <option value="{{ $exercise->id }}" {{ $exercise->id == $program->exercise_id ? 'selected' : '' }}>{{ $exercise->name }}</option>
                            @endforeach
                        </select>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="reps-{{ $index }}" class="form-label">Reps</label>
                                <input type="number" id="reps-{{ $index }}" name="exercises[{{ $index }}][reps]" class="form-control" value="{{ $program->reps }}" required>
                            </div>
                            <div class="col">
                                <label for="sets-{{ $index }}" class="form-label">Sets</label>
                                <input type="number" id="sets-{{ $index }}" name="exercises[{{ $index }}][sets]" class="form-control" value="{{ $program->sets }}" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger mt-2 remove-exercise">Remove Exercise</button>
                    </div>
                    @endforeach
                </div>

                <button type="button" id="add-exercise" class="btn btn-secondary mb-3">Add Exercise</button>
                <button type="submit" class="btn btn-primary mb-3">Update Plan</button>
            </form>
        </div>
    </div>
</div>

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

    var newButton = document.createElement('button');
    newButton.type = 'button';
    newButton.className = 'btn btn-danger mt-2 remove-exercise';
    newButton.textContent = 'Remove Exercise';

    newButton.addEventListener('click', function() {
        this.parentElement.remove();
    });

    var row = document.createElement('div');
    row.className = 'row mt-2';

    var col1 = document.createElement('div');
    col1.className = 'col';
    col1.appendChild(repsLabel);
    col1.appendChild(repsInput);

    var col2 = document.createElement('div');
    col2.className = 'col';
    col2.appendChild(setsLabel);
    col2.appendChild(setsInput);

    row.appendChild(col1);
    row.appendChild(col2);

    newExercise.appendChild(newLabel);
    newExercise.appendChild(newSelect);
    newExercise.appendChild(row);
    newExercise.appendChild(newButton);

    exerciseContainer.appendChild(newExercise);
});

document.querySelectorAll('.remove-exercise').forEach(function(button) {
    button.addEventListener('click', function() {
        this.parentElement.remove();
    });
});
</script>
@endsection
