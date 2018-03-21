module.exports = function (bh) {
    bh.match('h', function (ctx, json) {
        var fish = ['Заголовок H'+(json.size || 1), '- Из ряда вон выходящий имидж: методология и особенности'];
        for(var i = 1 ; i < (json.size || 1); i++) fish.push(fish[1]);

        ctx.tag('h'+(json.size || 1)).content([
            fish
        ]);
    });
};