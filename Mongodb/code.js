

bd.players.ensureIndex({"nom": 1});

db.tams.ensureIndex({"nom": 1});



//---------------------------

var mapFunction = function() {
                       for (var idx = 0; idx < this.team_dom.notes.length; idx++) {
                           var key = this.items[idx].player;
                           var value = {
                                         count: 1,
                                         note: this.items[idx].note
                                       };
                           emit(key, value);
                       };
                       for (var idx = 0; idx < this.team_ext.notes.length; idx++) {
                           var key = this.items[idx].player;
                           var value = {
                                         count: 1,
                                         note: this.items[idx].note
                                       };
                           emit(key, value);
                       }
                    };


var reduceFunction = function(key, countObjVals) {
                     reducedVal = { count: 0, note: 0 };

                     for (var idx = 0; idx < countObjVals.length; idx++) {
                         reducedVal.count += countObjVals[idx].count;
                         reducedVal.note += countObjVals[idx].qty;
                     }
                     // if (reducedVal.count < 3) {return null;}
                     return reducedVal;
                  };


var finalizeFunction = function (key, reducedVal) {

                       reducedVal.avg = reducedVal.note/reducedVal.count;

                       return reducedVal;

                    };


db.compets.mapReduce( mapFunction,
                     reduceFunction,
                     {
                       out: { merge: "map_reduce_example" },
                       finalize: finalizeFunction
                     }
                   )



    {
	"_id" : ObjectId("5c0d68579c5d98104342c8a3"),
	"nom" : "",
	"date" : "",
	"team_dom" : [
		"",
		"2",
		[
			{
				"player" : "yassine",
				"note" : "15"
			},
			{
				"player" : "",
				"note" : "744"
			},
			{
				"player" : "",
				"note" : ""
			}
		]
	],
	"team_ext" : [
		"",
		"2",
		[
			{
				"player" : "ally",
				"note" : "22"
			},
			{
				"player" : "",
				"note" : ""
			}
		]
	