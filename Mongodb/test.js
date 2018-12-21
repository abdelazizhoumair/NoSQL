
var mapFunction = function() {
                       for (var idx = 0; idx < this.team_dom.notes.length; idx++) {
                           var key = this.team_dom.notes[idx].player;
                           var value = {
                                         count: 1,
                                         note: this.team_dom.notes[idx].note
                                       };
                           emit(key, value);
                       }
                       for (var idx = 0; idx < this.team_ext.notes.length; idx++) {
                           var key = this.team_ext.notes[idx].player;
                           var value = {
                                         count: 1,
                                         note: this.team_ext  .notes[idx].note
                                       };
                           emit(key, value);
                       }
                    };


var reduceFunction = function(key, countObjVals) {
                     reducedVal = { count: 0, note: 0 };

                     for (var idx = 0; idx < countObjVals.length; idx++) {
                         reducedVal.count += countObjVals[idx].count;
                         reducedVal.note += countObjVals[idx].note;
                     }
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