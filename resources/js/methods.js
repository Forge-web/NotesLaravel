const notesListWrapper = '#notes-list';
const notesAddWrapper = '#notes-add';
const notesViewWrapper = '#notes-view';
const notesEditWrapper = '#notes-edit';
const notesInputName = '#name';
const notesInputDescription = '#description';

const InputsAdd = [
    notesInputName,
    notesInputDescription
]

function clearInputs(listInputs = []) {
    if (listInputs == []) return;
    
    listInputs.forEach(el => {
        $(String(el)).val('');
    });
}

function destroy(id, replace_to_host=false) {
    $.ajax(
        {
            url: `http://127.0.0.1:8000/api/${id}`,
            method: 'delete',
            dataType: 'json',
            contentType: 'application/json',
            success: function() {
                $(`#note-wrapper-${id}`).remove()
                if (replace_to_host == true){
                    window.location.replace('/');
                }
            }
        }
    )
}

function save(name, description) {
    $.ajax(
        {
            url: `http://127.0.0.1:8000/api`,
            method: 'POST',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify({
                "name": name, 
                "description": description
            }),

            success: function() {
                window.location.replace('/');
            }
        }
    )
}

function update(id, data, url_replace) {
    $.ajax(
        {
            url: `http://127.0.0.1:8000/api/${id}`,
            method: 'PATCH',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function() {
                window.location.replace(url_replace);
            }
        }
    )
}

function swapWrapper(a, b) {
    $(a).addClass('hidden');
    $(b).removeClass('hidden');
}

function addButton() {
    swapWrapper(notesListWrapper, notesAddWrapper);
}

function cancelButton() {
    swapWrapper(notesAddWrapper, notesListWrapper);
    clearInputs(InputsAdd);
}

function editButton() {
    swapWrapper(notesViewWrapper, notesEditWrapper);
}

function cancelEditButton() {
    swapWrapper(notesEditWrapper, notesViewWrapper);
    $(notesInputName).val($('#note-view-name').text());
    $(notesInputDescription).val($('#note-view-description').text());
}

function saveEditButton(id, url_replace='/') {
    let data = {
        'name': String($('#name').val()),
        'description': String($('#description').val())
    };

    update(id, data, url_replace);
}

function saveButton() {
    let name = $(notesInputName).val();
    let description = $(notesInputDescription).val();
    save(name, description);
    clearInputs(InputsAdd);
}

function updateButton(id, data, url_replace='/') {
    update(id, data, url_replace);
}

window.NoteMethods = {
    destroy,
    addButton,
    cancelButton,
    saveButton,
    updateButton,
    editButton,
    cancelEditButton,
    saveEditButton,
}