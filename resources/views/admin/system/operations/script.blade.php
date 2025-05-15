<script>
    var d = new Date();
    let table = new Array();
    var somme = 0;
    var reset = 0;
    var strDate = d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate();
    $('#list_add').click(function() {
        var name = $('#article_Lname')
        var qte = $('#article_Lqte');
        var prix = $('#article_Lprix');
        var date = $('#article_Ldate');
        let obj = {
            'name': name.val(),
            'qte': qte.val(),
            'prix': prix.val() * qte.val(),
            'date': date.val()
        };
        table.push(obj);
        name.val("");
        qte.val("");
        prix.val("");
        date.val("");
        somme = somme + obj.prix;
        reset = somme;
        var html;
        table.forEach((e, index) => {
            html += `<tr><td>1</td>
        <td>` + table[index].name + `</td>
        <td>` + table[index].qte + `</td>
        <td>` + Math.trunc(table[index].prix * 100) / 100 + `</td></tr>`;

        });
        $('#tbodyArticle').html(
            `                       <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>__("Designation")</th>
                                            <th>__("Qte")</th>
                                            <th>__("Prix total")</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ` + html + `
                                    </tbody>
                                    `

        );

        $('#total').html((Math.trunc(somme * 100) / 100).toString());
        $('#total_input').val((Math.trunc(somme * 100) / 100));
        // alert(table.length);
    });

    function tva_change() {
        alert($('#tva').val());
        somme += somme / $('#tva').val();
        $('#total').html((Math.trunc(somme * 100) / 100).toString());
        $('#total_input').val((Math.trunc(somme * 100) / 100));
    }
    $('#tva').keyup(function(e) {
        if (e.keyCode == 8 || e.keyCode == 46) {
            somme = reset;
        }
    });
    let charge = new Array();
    $('#charge_btn').click(() => {
        $('.close').click();
        var descr = $('#charge_Ldescription');
        var montant = $('#charge_Lmontant');
        let obj = {
            'designation': descr.val(),
            'montant': montant.val()
        };

        somme = somme + parseFloat(obj.montant);
        var html;
        charge.push(obj);
        charge.forEach((e, index) => {
            html += `
            <tr>
            <td>` + (index + 1) + `</td>
            <td>` + e.designation + `</td>
            <td>` + e.montant + `</td>
            </tr>
`;
        });
        $('#total').html((Math.trunc(somme * 100) / 100).toString());
        $('#total_input').val((Math.trunc(somme * 100) / 100));
        $('#charge_null').html(`
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>__("Designation")</th>
                                            <th>__("Montant")</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ` + html + `
                                    </tbody>


        `);
    });
    $('#btn-achat-operation').click(() => {
        $('#total_mode').text(somme);
    });
</script>
