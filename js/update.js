function updateTeam(id){
    var name = $("input[name='team-name']")
    var uni = $("input[name='team-uni']")
    var category = $("input[name='team-category']")
    var leader = $("input[name='team-leader']")

    $.ajax({
      type: "post",
      url: "update/update_team.php",
      data: {team_id: id, team_name: name, team_uni: uni, team_leader: leader, team_category: category}
    }).done(function(result){
      console.log(result);
    })
}
