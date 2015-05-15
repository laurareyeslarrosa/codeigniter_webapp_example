/*
var dedeos = 'aaaaaaaaaaa';

alert(dedeos);


$(document).on('click', '#btn_coso', function()
{
   // alert('asdqweqwe');
    dedeos = 'bbbb';
    alert(dedeos);
});
*/

/*


var old_song_id = '';
var isChrome = !!window.chrome;

if (isChrome)
{
    var music_db = openDatabase("music_db", "1", "Music database", 5 * 1024 * 1024);
}
$(document).ready(function () {
    $("#main_header").height($(window).height());
    (!isChrome) ? $(".header_options").addClass('hidden') : false;
});

$(document).on("click", "#search_button", function () {
    get_search_results(document.getElementById('search_text').value, function (my_data) {
        $("#results_table tbody").remove();

        if (my_data.length === 0)
        {
            $("#results_table").addClass('hidden');
            $("#alert_message").removeClass('hidden');
        }
        else
        {
            var result_rows_container = $('<tbody>');
            for (var i = 0; i < my_data.length; i++) {
                if (isChrome)
                {
                    var result_row = "<tr id='" + my_data[i].song_id + "'><td class='play_button' onclick='play_audio(\"" + my_data[i].song_id + "\")'><img src='assets/img/play_rep.png'></td><td class='favorite_button' onclick='save_favorite(\"" + my_data[i].song_id + "\")'><img src='assets/img/is_not_favorite.png'></td><td>" + my_data[i].song_title + "</td><td>" + my_data[i].song_artist + "</td></tr>";
                }
                else
                {
                    var result_row = "<tr id='" + my_data[i].song_id + "'><td class='play_button' onclick='play_audio(\"" + my_data[i].song_id + "\")'><img src='assets/img/play_rep.png'></td><td></td><td>" + my_data[i].song_title + "</td><td>" + my_data[i].song_artist + "</td></tr>";
                }
                result_rows_container.append(result_row);
            }
            $("#results_table").append(result_rows_container);
            $("#results_table").removeClass('hidden');
            $("#alert_message").addClass('hidden');
        }
        $("html,body").scrollTop(window.innerHeight);
    });
});

$(document).on("click", "#recent_button", function () {
    get_recent_results(function (my_data) {
        $("#results_table tbody").remove();
        if (my_data.length === 0)
        {
            $("#results_table").addClass('hidden');
            $("#alert_message").removeClass('hidden');
        }
        else
        {
            var result_rows_container = $('<tbody>');
            for (var i = 0; i < my_data.length; i++) {
                var result_row = "<tr id='" + my_data[i].song_id + "'><td class='play_button' onclick='play_audio(\"" + my_data[i].song_id + "\")'><img src='assets/img/play_rep.png'></td><td class='favorite_button' onclick='save_favorite(\"" + my_data[i].song_id + "\")'><img src='assets/img/is_not_favorite.png'></td><td>" + my_data[i].song_title + "</td><td>" + my_data[i].song_artist + "</td></tr>";
                result_rows_container.append(result_row);
            }
            $("#results_table").append(result_rows_container);
            $("#results_table").removeClass('hidden');
            $("#alert_message").addClass('hidden');
        }
        $("html,body").scrollTop(window.innerHeight);
    });
});

$(document).on("click", "#favorite_button", function () {
    get_favorite_results(function (my_data) {
        $("#results_table tbody").remove();
        if (my_data.length === 0)
        {
            $("#results_table").addClass('hidden');
            $("#alert_message").removeClass('hidden');
        }
        else
        {
            var result_rows_container = $('<tbody>');
            for (var i = 0; i < my_data.length; i++) {
                var result_row = "<tr id='" + my_data[i].song_id + "'><td class='play_button' onclick='play_audio(\"" + my_data[i].song_id + "\")'><img src='assets/img/play_rep.png'></td><td class='favorite_button' onclick='save_favorite(\"" + my_data[i].song_id + "\")'><img src='assets/img/is_not_favorite.png'></td><td>" + my_data[i].song_title + "</td><td>" + my_data[i].song_artist + "</td></tr>";
                result_rows_container.append(result_row);
            }

            $("#results_table").append(result_rows_container);

            $("#results_table").removeClass('hidden');
            $("#alert_message").addClass('hidden');
        }
        $("html,body").scrollTop(window.innerHeight);
    });
});

//funcion que se encarga de llamar al php que busca los resultados de busqueda en la pagina de goear
function get_search_results(search_query, callBack) {
    $.ajax({
        method: "GET",
        url: "http://45.55.149.174/search_songs.php",
        data: {
            search_query: search_query
        },
        dataType: "text",
        success: function (data) {
            callBack(JSON.parse(data));
        },
        error: function (data) {
            callBack(JSON.parse(data));
        }
    });
}

//funcion que obtiene los resultados guardados en la tabla que contiene los temas recientemente escuchados
function get_recent_results(callBack) {
    var this_html = [];
    music_db.transaction(function (tx) {
        tx.executeSql('CREATE TABLE IF NOT EXISTS recent_results_table (row_id INTEGER PRIMARY KEY, song_id, song_title, song_artist)');
        tx.executeSql('SELECT * FROM recent_results_table ORDER BY row_id DESC', [], function (lang_db, results) {
            for (i = 0; i < results.rows.length; i++) {
                this_html.push({
                    song_id: results.rows.item(i).song_id,
                    song_title: results.rows.item(i).song_title,
                    song_artist: results.rows.item(i).song_artist
                });
            }
            callBack(this_html);
        });
    });
}

//funcion que obtiene los resultados guardados en la tabla que contiene los temas favoritos
function get_favorite_results(callBack) {
    var this_html = [];
    music_db.transaction(function (tx) {
        tx.executeSql('CREATE TABLE IF NOT EXISTS favorite_results_table (row_id INTEGER PRIMARY KEY, song_id, song_title, song_artist)');
        tx.executeSql('SELECT * FROM favorite_results_table ORDER BY row_id DESC', [], function (lang_db, results) {
            for (i = 0; i < results.rows.length; i++) {
                this_html.push({
                    song_id: results.rows.item(i).song_id,
                    song_title: results.rows.item(i).song_title,
                    song_artist: results.rows.item(i).song_artist
                });
            }
            callBack(this_html);
        });
    });
}

function save_recent_results(song_id) {
    var song_title = $("#" + song_id + " td:nth-child(3)").text();
    var song_artist = $("#" + song_id + " td:nth-child(4)").text();
    if (isChrome)
    {
        music_db.transaction(function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS recent_results_table (row_id INTEGER PRIMARY KEY, song_id, song_title, song_artist)');
            tx.executeSql('SELECT * FROM recent_results_table WHERE song_id="' + song_id + '"', [], function (lang_db, results) {
                if (results.rows.length === 0)
                {
                    tx.executeSql("INSERT INTO recent_results_table (song_id, song_artist, song_title) VALUES ('" + song_id + "', '" + song_artist + "', '" + song_title + "')");
                }
            });
        });
    }
}

function save_favorite(song_id) {
    var song_title = $("#" + song_id + " td:nth-child(3)").text();
    var song_artist = $("#" + song_id + " td:nth-child(4)").text();
    if (isChrome)
    {
        music_db.transaction(function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS favorite_results_table (row_id INTEGER PRIMARY KEY, song_id, song_title, song_artist)');
            tx.executeSql('SELECT * FROM favorite_results_table WHERE song_id="' + song_id + '"', [], function (lang_db, results) {
                if (results.rows.length === 0)
                {
                    tx.executeSql("INSERT INTO favorite_results_table (song_id, song_artist, song_title) VALUES ('" + song_id + "', '" + song_artist + "', '" + song_title + "')");
                    $("#" + song_id + " .favorite_button img").attr('src', 'assets/img/is_favorite.png');
                }
                else
                {
                    tx.executeSql("DELETE FROM favorite_results_table WHERE song_id='" + song_id + "'");
                    $("#" + song_id + " .favorite_button img").attr('src', 'assets/img/is_not_favorite.png');
                }
            });
        });
    }
}

function play_audio(song_id) {
    save_recent_results(song_id);
    $("#audio_container").empty();
    var audio_tag = "<audio controls autoplay src='http://www.goear.com/action/sound/get/" + song_id + "'><p>Su navegador no soporta el elemento <code>audio</code>.</p></audio>";
    $("#audio_container").append(audio_tag);
    $("#" + song_id + " .play_button img").attr('src', 'assets/img/pause_rep.png');
    (old_song_id !== '') ? $("#" + old_song_id + " .play_button img").attr('src', 'assets/img/play_rep.png') : false;
    old_song_id = song_id;
}

*/