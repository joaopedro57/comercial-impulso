<div id='aparecer' class='col-sm-4'>
   <div class='ibox'>
      <div class='ibox-content'>
         <div class='tab-content'>
            <div class='tab-pane active'>
               <div class='row m-b-lg'>
                  <div class='col-lg-12 text-center'>
                     <h2> <strong> <?php echo $result['0']['title'] ?></strong> </h2>
                  </div>
                  <div class='col-lg-12'>
                     <p> " + result.cenario_lead + " </p>
                  </div>
               </div>
               <div class='client-detail' style='display: inline-block;'>
                  <div class='full-height-scroll'>
                     <strong>Condições de Fechamento</strong> 
                     <p> " + result.condicao_fechamento + " </p>
                     <hr/>
                     <strong>Resumo do Fechamento</strong> 
                     <p> " + result.resumo_fechamento + " </p>
                     <hr/>
                     <strong>Informações da Conta</strong> 
                     <div id='vertical-timeline' class='vertical-container dark-timeline'>
                        <div class='vertical-timeline-block'>
                           <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-coffee'></i> </div>
                           <div class='vertical-timeline-content'>
                              <p> SDR: " + result.sdr + " </p>
                           </div>
                        </div>
                        <div class='vertical-timeline-block'>
                           <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-briefcase'></i> </div>
                           <div class='vertical-timeline-content'>
                              <p> Data do Ganho: " + result.data_ganho + " </p>
                           </div>
                        </div>
                        <div class='vertical-timeline-block'>
                           <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-briefcase'></i> </div>
                           <div class='vertical-timeline-content'>
                              <p> ID do Pipe: " + result.id + "</p>
                           </div>
                        </div>
                        <div class='vertical-timeline-block'>
                           <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-briefcase'></i> </div>
                           <div class='vertical-timeline-content'>
                              <p> Pessoa em Contato: " + result.pessoa_contato + " </p>
                           </div>
                        </div>
                        <div class='vertical-timeline-block'>
                           <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-bolt'></i> </div>
                           <div class='vertical-timeline-content'>
                              <p> Cargo: " + result.cargo + " </p>
                           </div>
                        </div>
                        <div class='vertical-timeline-block'>
                           <div class='vertical-timeline-icon navy-bg'> <i class='fa fa-warning'></i> </div>
                           <div class='vertical-timeline-content'>
                              <p> Produto: " + result.produto + " </p>
                           </div>
                        </div>
                        <div class='vertical-timeline-block'>
                           <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-coffee'></i> </div>
                           <div class='vertical-timeline-content'>
                              <p> Ciclo de Venda: " + result.ciclo_venda + " </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>