<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script>
    $('body').on('click', '.delete-confirm', function() {
        let id = $(this).data('id');
        let name = $(this).data('name').toUpperCase();

        Swal.fire({
            title: 'Are you sure?',
            text: `You want to delete ${name}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`form-delete-${id}`).submit()
            }
        })

    });
</script>

<script>
    $('body').on('click', '#btn_edit_modal', function() {
        let id = $(this).data('id');
        let email = $(this).data('email');
        let name = $(this).data('name');
        document.getElementById('input_email').value = email;
        document.getElementById('input_name').value = name;
        document.getElementById("form_edit_modal").action = `user/${id}`;
    });
</script>

<script>
    let table = document.getElementById('user-table');

    fetch('http://127.0.0.1:8000/api/user')
        .then(response => response.json())
        .then(data => {
            data.users.forEach((element) => {
                let row = document.createElement('tr');
                row.innerHTML =
                    `<td>${element.id}</td>
                    <td>${element.name}</td>
                    <td>${element.email}</td>
                    <td>
                        <button class="badge bg-warning border-0 text-white p-2 mx-2" data-bs-toggle="modal"
                            data-bs-target="#editModal" id="btn_edit_modal" data-id="${element.id}" 
                            data-email="${element.email}" data-name="${element.name}"><i class="fas fa-fw fa-pencil"
                                style="font-size: 18px;"></i></button>
                        <button class="badge bg-danger border-0 p-2 mx-2 delete-confirm"
                            data-id="${element.id}" data-name="${element.name}"><i
                                class="fas fa-fw fa-trash text-white" style="font-size: 18px;"></i></button>
                        <form action="user/${element.id}" id="form-delete-${element.id}" method="POST"
                           style="display: none">
                            @method('delete')
                            @csrf
                            <input type="submit" class="" value="Delete">         
                        </form>
                    </td>`;
                table.append(row);
            })
        })
        .catch(err => console.error(err));
</script>
