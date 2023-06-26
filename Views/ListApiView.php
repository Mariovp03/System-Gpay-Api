<div class="container w-75 d-flex justify-content-center h-25 mt-5" style="height:70vh">
    <div class="d-flex align-items-center text-center">
    <table class="table">
    <thead class="table-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach($list->Customers as $value){ ?>
        <tr>
            <th scope="row"><?= $value->galaxPayId ?></th>
            <td><?= $value->name ?></td>
            <td><?= $value->status ?></td>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg></td>
            <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    </div>  
</div>