<div class="form-group">
    <label for="exampleInputEmail1">Название лекарства</label>
    <input type="text" class="form-control" placeholder="Введите название" name="name" @if(isset($medicament)) value="{{ $medicament->name }}" @endif required>
</div>
<div class="form-group">
    <label>Категория лекарства</label>
    <select class="form-control" name="category_id" required @if(isset($medicament)) value="{{ $medicament->category_id }}" @endif>
        <option @if(!isset($medicament->category_id)) selected @endif value={{ null }}>Выберите категорию лекарства</option>
        @foreach ($categories as $category)
            <option 
                value="{{ $category->id }}"
                @if(isset($medicament->category_id))
                    @if($medicament->category_id == $category->id)
                        selected
                    @endif
                @endif
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>