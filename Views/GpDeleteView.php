<div class="container w-100 d-flex justify-content-center" style="height:70vh">
    <div class="d-flex align-items-center text-center flex-column justify-content-center">
    <h1 class="mb-5 display-4">Esse cliente foi excluído!</h1>    
    <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                    <tr>
                        <th scope="row"><?= $myId ?></th>
                        <td><?= $name ?></td>
                        <td><?= $document ?></td>
                        <td><?= $email ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>