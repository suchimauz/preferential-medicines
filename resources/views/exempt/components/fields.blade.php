<div class="form-group">
    <label for="exampleInputEmail1">Название льготника</label>
    <input type="text" class="form-control" placeholder="Введите название" name="name" @if(isset($exempt->name)) value="{{ $exempt->name }}" @endif required>
</div>