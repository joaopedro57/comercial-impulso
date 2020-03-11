let $window = $(window);
let numLarguraJanela = $window.width();
let padding = { top: 20, right: 40, bottom: 0, left: 0 };
let w = 550 - padding.left - padding.right;
let h = 550 - padding.top - padding.bottom;

if (numLarguraJanela < 600) {
    w = 300 - padding.left - padding.right;
    h = 300 - padding.top - padding.bottom;
}

$('.premio').hide();
let r = Math.min(w, h) / 2,
rotation = 0,
oldrotation = 0,
picked = 1,
color = d3.scale.ordinal().range(["#073d70", "#2d6087", "#073d70", "#2d6087", "#073d70", "#2d6087"]);



var data = [
    { "label": "10% na primeira mensalidade", "value": 1, "question": "Parabéns, você ganhou 10% de desconto na primeira mensalidade", "radius" : 5 },
    { "label": "5 EAD's Liderança", "value": 2, "question": "Parabéns, você ganhou 5 EAD's para treinar suas lideranças", "radius":  349},
    { "label": "2H de atend. personalizado do CS", "value": 3, "question": "Parabéns, você ganhou 2H de atendimento personalizado no Sucesso do Cliente", "radius":  334 },
    { "label": "1 formação presencial", "value": 4, "question": "Parabéns, você ganhou 1 formação presencial", "radius":  318},
    { "label": "25% na primeira mensalidade ", "value":5, "question": "Parabéns, você ganhou 25% de desconto na primeira mensalidade", "radius":  302},
    { "label": "Tente outra vez ", "value": 6, "question": "Quase, tente outra vez! Desta vez terá mais sorte! :) ", "radius":   287},
    { "label": "5 Créditos Profiler", "value": 7, "question": "Parabéns, você ganhou 5 creditos Profiler! :) ", "radius":   271},
    { "label": "2 EAD's People Analytics ", "value": 8, "question": "Parabéns, você ganhou 2 EAD's People Analytics! :) ", "radius":   255},
    { "label": "2 EAD's Gestão Comportamental ", "value": 9, "question": "Parabéns, você ganhou 2 EAD's Gestão Comportamental! :) ", "radius":   240},
    { "label": "2 Créditos Profiler", "value": 10, "question": "Parabéns, você ganhou 2 creditos Profiler! :) ", "radius":   224},
];

var svg = d3.select('#chart')
    .append("svg")
    .data([data])
    .attr("width", w + padding.left + padding.right)
    .attr("height", h + padding.top + padding.bottom);
var container = svg.append("g")
    .attr("class", "chartholder")
    .attr("transform", "translate(" + (w / 2 + padding.left) + "," + (h / 2 + padding.top) + ")");
var vis = container
    .append("g");

var pie = d3.layout.pie().sort(null).value(function (d) { return 1; });
// declare an arc generator function
var arc = d3.svg.arc().outerRadius(r);
// select paths, use arc generator to draw
var arcs = vis.selectAll("g.slice")
    .data(pie)
    .enter()
    .append("g")
    .attr("class", "slice");

    arcs.append("path")
    .attr("fill", function (d, i) { return color(i); })
    .attr("d", function (d) { return arc(d); });
// add the text
    arcs.append("text").attr("transform", function (d) {
        d.innerRadius = 0;
        d.outerRadius = r;
        d.angle = (d.startAngle + d.endAngle) / 2;
        return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius - 10) + ")";
    })
        .style({ "fill": "#ffffff"})
        .attr("text-anchor", "end")
        .text(function (d, i) {
             return data[i].label;
        });

    if (numLarguraJanela < 600) {
        $("text").css("font-size", "8px");
    }

    //container.on("click", spin);
    var btn = d3.select('#rodar');
    btn.on("click", spin);

function spin(d) {

    if( !IsEmail($('#email').val()) ) {
        return 
    }
    
    btn.on("click", null);
    //all slices have been seen, all done
  
    //picked = parseInt($('#valor').val());
    picked = Math.floor((Math.random() * 9));
    $("#sorteio").val(picked);

    var ps = 360 / data.length,
        pieslice = Math.round(1440 / data.length),
        rng = Math.floor(data[picked].radius + 720);
    

    //rotation = (Math.round(rng / ps) * ps);
    
   
    rotation += 90 - Math.round(ps / 2);
    
    if (picked == 0) { rotation = 1152; }
    else if (picked == 1) { rotation = 1116; }
    else if (picked == 2) { rotation = 1080; }
    else if (picked == 3) { rotation = 1044; }
    else if (picked == 4) { rotation = 1008; }
    else if (picked == 5) { rotation = 1332; }
    else if (picked == 6) { rotation = 1296; }
    else if (picked == 7) { rotation = 1260; }
    else if (picked == 8) { rotation = 1224; }
    else if (picked == 9) { rotation = 1188; }

    vis.transition()
        .duration(3000)
        .attrTween("transform", rotTween)

    .each("end", function () {
        //mark question as seen
        d3.select(".slice:nth-child(" + (picked + 1 ) + ") path")
        //populate question
        d3.select("#question h1")
        .text(data[picked].question)
        .style({ "font-weight": "bold", "color": "#fff", });
        
        oldrotation = rotation;
        swal({
            title: "Parabéns!!!",
            text: data[picked].question,
            icon: "success",
            buttons: "Pegue seu prémio",
            value: "enviarPremio",
            })
            .then((enviarPremio) => {
                $.ajax({
                    url:'http://comercial.solides.adm.br/index.php/Roda_Indicacao/enviar', 
                    data: $('#indicacao').serialize(),
                    method: 'POST',
                    success: function(result) {
                        if (result == "certo") {
                            swal({
                                title: "Parabéns!!!",
                                text: "Um e-mail com seu prémio foi enviado para você!!",
                                icon: "success",
                                button: "Indique novamente!!",
                                value : "indicarDenovo",
                            })
                                .then((indicarDenovo) => {
                                    window.location.replace("http://comercial.solides.adm.br/index.php/Roda_Indicacao");
                                });
                        }
                        else if (result == "falhou") {
                            swal({
                                title: "Opss!!!",
                                text: "Algumas das informações não foram preenchidas corretamente!",
                                icon: "error",
                                button: "Tente denovo"
                            })
                        }
                    },
                    error: function(result) {
                        swal({
                                title: "Opss!!!",
                                text: "Algumas das informações não foram preenchidas corretamente!",
                                icon: "error",
                                button: "Tente denovo"
                        })
                    } 
                });
            });
            
            btn.on("click", spin);
        }); 
}

//draw spin circle
container.append("circle")
    .attr("cx", 0)
    .attr("cy", 0)
    .attr("r", 20)
    .style({"fill": "white", "cursor": "pointer" });
//spin text
container.append("text")
    .attr("x", 0)
    .attr("y", 15)
    .attr("text-anchor", "middle")
    .text(" ")
    .style({"font-weight": "bold", "font-size": "17px", });


function rotTween(to) {
    var i = d3.interpolate(oldrotation % 360, rotation);
    return function (t) {
         return "rotate(" + i(t) + ")";
    };
}

function IsEmail(email) {
    let checkend = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (email.search(checkend) == -1) {
        swal({
            title: "E-mail Inválido",
            text: "Para conseguir participar do nosso sorteio, insira um e-mail válido!",
            icon: "error",
            button: "ok",
        });
        return false;
    }
    else {
        btn.on("click", spin);
        return true;
    }
}


/*
function getRandomNumbers() {
    var array = new Uint16Array(1000);
    var scale = d3.scale.linear().range([360, 1440]).domain([0, 100000]);
    console.log(event);
    if (window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function") {
        window.crypto.getRandomValues(array);
        console.log("works");
    } else {
        //no support for crypto, get crappy random numbers
        for (var i = 0; i < 1000; i++) {
            array[i] = Math.floor(Math.random() * 100000) + 1;
        }
    }
    return array;
}*/
