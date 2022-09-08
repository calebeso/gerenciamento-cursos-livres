<section>
<div class="row dash">
    <div class="col-xl-4 col-md-12">
      <div class="card overflow-hidden dash">
        <div class="card-content">
          <div class="card-body cleartfix">
            <div class="media align-items-stretch">
              <div class="align-self-center">
                <i class="icon-pencil primary font-large-2 mr-2"></i>
              </div>
              <div class="media-body">
                <h4>Turmas Connections</h4>
                <span>Total</span>
              </div>
              <div class="align-self-center">
                <h1>{{ count($t_connections)}}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-12">
      <div class="card dash">
        <div class="card-content">
          <div class="card-body cleartfix">
            <div class="media align-items-stretch">
              <div class="align-self-center">
                <i class="icon-speech warning font-large-2 mr-2"></i>
              </div>
              <div class="media-body">
                <h4>Alunos matriculados (Total)</h4>
                <span>Total </span>
              </div>
              <div class="align-self-center"> 
                <h1>{{ count($alunos)}}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row dash">
    <div class="col-xl-4 col-md-12">
      <div class="card dash">
        <div class="card-content">
          <div class="card-body cleartfix">
            <div class="media align-items-stretch">
              <div class="align-self-center">
              <div class="media-body">
                <h4>Turmas Interactive</h4>
                <span>Total</span>
              </div>
              </div>
              <div class="align-self-center">
                <h1>{{ count($t_interactive)}}</h1>
              </div>
              <div class="align-self-center">
                <i class="icon-heart danger font-large-2"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-12">
      <div class="card dash">
        <div class="card-content">
          <div class="card-body cleartfix">
            <div class="media align-items-stretch">
              <div class="align-self-center">
              <div class="media-body">
                <h4>Livros Cadastrados</h4>
                <span>Total</span>
              </div>
              </div>
              <div class="align-self-center">
                <h1>{{ count($livros)}}</h1>
              </div>
              <div class="align-self-center">
                <i class="icon-wallet success font-large-2"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
