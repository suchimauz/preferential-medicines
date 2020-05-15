<div class="form-group">
    <label for="exampleInputEmail1">Форма выпуска</label>
    <input type="text" class="form-control" placeholder="Введите название" name="name" @if(isset($release->name)) value="{{ $release->name }}" @endif required>
</div>