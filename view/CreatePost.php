<!-- modal representa o pop-up que abre depois que a opção "Criar post" é clicada. -->
<div class="modal" tabindex="-1">
<!-- modal-dialog; modal-content; modal-header; modal-title são as camadas do pop-up, com o dialog sendo a camada que personaliza o modal (pop-up)-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Criar Post</h5>
        <!-- Fecha o modal (ele é o x, do canto superior direito) -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="CloseModalButton()" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <form action="api/CreatePost.php" method="POST" enctype = "multipart/form-data" class="form-floating">
        <!-- Aonde localiza os inputs e os campos para enviar pro banco de dados e preencher a tabela posts -->
        <div class="custom-bg">
          <!-- form-control é uma variável do framework bootstrap que estiliza o formulário de maneira rápida -->
            <input id="UploadImage" class="form-control form-control-sm" name="image" type="file" onchange ="PreviewImage()" required>
            <!-- img-div mantém a imagem contida na div, logo se ela for maior do que o tamanho da div, ela mesmo assim assumirá o tamanho programado. -->
            <div class="img-div">
              <!-- mx-auto, img-thumbnail são variáveis do bootstrap.css que permite uma visão mais limpa da imagem e também sua posição no meio do forms. -->
                <img class="mx-auto img-fit img-thumbnail" id="UploadPreview">
            </div>
            <input type="text" class="form-control" name="title" id="title_post" required placeholder="Insira o título da publicação aqui...">
            <br>
            <textarea class="form-control" name="content" id="Content_post" required placeholder="Insira o conteúdo da publicação aqui..."></textarea>
            <br>
            <!-- O Select é a ferramenta que me permite escolher entre os gêneros disponíveis -->
            <select name="select" class="form-select" required>
              <option value="Select">--Gênero--</option>
              <option value="Ação/Aventura">Ação/Aventura</option>
              <option value="Ficção Científica">Ficção Científica</option>
              <option value="Drama">Drama</option>
              <option value="Romance">Romance</option>
              <option value="Didático">Didático</option>
              <option value="Terror/Suspense">Terror/Suspense</option>
              <option value="HQ">HQ ou Mangás</option>
              <option value="Guerra">Guerra</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <!-- Aqui embaixo possuimos dois botões o de cancelar e o de confirmar. -->
        <button type="button" class="btn btn-danger" onclick="CloseModalButton()" data-bs-dismiss="modal">Close</button>
        <input type="submit" value="Confirmar"   name="Submit" id='post_submit' class="btn btn-outline-success opacity-80">
      </div>
    </form>
    </div>
  </div>
</div>