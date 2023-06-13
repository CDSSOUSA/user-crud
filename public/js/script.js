const clearMessageError = (option) => {

    if (typeof option == 'string') {
        document.getElementById(option).innerHTML = '';
    } else {
        option.forEach((e) => {
            document.getElementById(e).innerHTML = '';
        })
    }
}
const deleteUserModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));

const URL_BASE = 'http://localhost/crud-user/public';

async function showUser(id) {
    await axios.get(`${URL_BASE}/user/${id}`)
        .then(response => {
            const data = response.data;
            console.log(data);
            if (data) {
                deleteUserModal.show()
                document.getElementById('id').value = id
                document.getElementById('name').value = data.name
                           
            }
        })
        .catch(error =>{
            console.log(error);
        });
}

const deleteUserForm = document.getElementById('deleteUserForm');


if (deleteUserForm) {

    deleteUserForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataForm = new FormData(deleteUserForm);
        
        console.log(dataForm.get('id'));


        await axios.delete(`${URL_BASE}/user/${dataForm.get('id')}`, dataForm, {
            headers: {
                "Content-Type": "application/json"
            }
        })
            .then(response => {               
                deleteUserModal.hide();
                window.location.href = `${URL_BASE}/user`
            })
            .catch(error => console.log(error))
    })
}

