<?php



/**********************************************/
//
//   Base Index definition
//
/**********************************************/
//    [
//        "indices" => [

/*
 * The name of the index
 */
//            "index_name" => [

/*
 * How often the index runs
 */
//                "frequency" => [],

/*
 * date format to use
 * in the index naming
 */
//                "dateFormat"=>'Y-m-d',

/*
 * Amount before failing
 */
//                "versionThreshold"=>5,

/*
 * Alias this index show have
 * as well as rules to remove
 * them
 */
//                "aliases" => [],

/*
 * Rules to close
 * an index
 */
//                "close" => [],

/*
 * Rules to archive
 * an index
 */
//                "archive" => [],

/*
 * The index definition
 */
//                "definition" => [

/*
 * The index to insert into, optional
 * If not set, uses indices array key
 */
//                    "index" => ""

/*
 * The type of the documents being
 * inserted, required
 */
//                    "type" => "",

/*
 * The number of shards, optional
 */
//                    "number_shards" => "",

/*
 *  The number of replica, optional
 */
//                    "number_replica" => "",

/*
 * The mappings for the index, required
 */
//                    "mappings" => [],

/*
 * The source of the index, required
 */
//                    "source" => [
//                        "type"      => "mysql|json",
//                        "location"       => "connection|file|dir",
//                        "pre_query"  => "",
//                        "post_query" => "",
//                        "queries"    => [],
//                    ],

/*
 * An array of call back functions, keyed by the column it affects,
 * to run on individual columns
 * of data to do some data manipulation
 *
 * example:
 * 'transformers' => [
 *      'part_number' => function($input){
 *          return strtoupper($input);
 *      }
 * ]
 *
 *
 */
//                    "transformers" => [],
//                ],
//            ],
//        ],
//    ];
/**********************************************/
//
//
/**********************************************/


return [
		"indices" => [
				[
						"frequency" => [],
						"dateFormat" => 'Y-m-d',
						"timezone" => 'CST',
						"versionThreshold" => 500,
						"definition" => [
								"index" => "lnk",
								"type" => "alliances",
								"number_shards" => "1",
								"number_replica" => "1",
								"mappings" => [
										'_source' => [
												'enabled' => true
										],
										'_timestamp' => [
												'store' => true,
												'index' => 'analyzed',
												'enabled' => true
										],
										'properties' => [
												"id" => [
														"type" => "integer"
												],
												"name" => [
														"type" => "string"
												],
												"rankAverage" => [
														"type" => "integer"
												],
												"rank" => [
														"type" => "integer"
												],
												"points" => [
														"type" => "integer"
												],
												"pointsAverage" => [
														"type" => "integer"
												],
												"description" => [
														"type" => "string"
												]
										],
								],
								"source" => [
										"type" => "json",
										"location" => ["http://maps3.lordsandknights.com/v2/LKWorldServer-US-8/dumps/alliances.json.gz"],
								],
								"transformers" => [],
						],
				],
				[
						"frequency" => [],
						"dateFormat" => 'Y-m-d',
						"timezone" => 'CST',
						"versionThreshold" => 500,
						"definition" => [
								"index" => "lnk",
								"type" => "players",
								"number_shards" => "1",
								"number_replica" => "1",
								"mappings" => [
										'_source' => [
												'enabled' => true
										],
										'_timestamp' => [
												'store' => true,
												'index' => 'analyzed',
												'enabled' => true
										],
										'properties' => [
												"id" => [
														"type" => "integer"
												],
												"nick" => [
														"type" => "string"
												],
												"points" => [
														"type" => "integer"
												],
												"rank" => [
														"type" => "integer"
												],
												"underAttackProtection" => [
														"type" => "boolean"
												],
												"onVacation" => [
														"type" => "boolean"
												]
										],
								],
								"source" => [
										"type" => "json",
										"location" => ["http://maps3.lordsandknights.com/v2/LKWorldServer-US-8/dumps/players.json.gz"],
								],
								"transformers" => [],
						],
				],
				[
						"frequency" => [],
						"dateFormat" => 'Y-m-d',
						"timezone" => 'CST',
						"versionThreshold" => 500,
						"definition" => [
								"index" => "lnk",
								"type" => "habitats",
								"number_shards" => "1",
								"number_replica" => "1",
								"mappings" => [
										'_source' => [
												'enabled' => true
										],
										'_timestamp' => [
												'store' => true,
												'index' => 'analyzed',
												'enabled' => true
										],
										"transform" => [
												"lang" => "groovy",
												"script" => "ctx._source['location']=[ctx._source['mapX'],ctx._source['mapY']]"
										],
										'properties' => [
												"id" => [
														"type" => "integer"
												],
												"name" => [
														"type" => "string"
												],
												"mapX" => [
														"type" => "integer"
												],
												"mapY" => [
														"type" => "integer"
												],
												"points" => [
														"type" => "integer"
												],
												"creationDate" => [
														"type" => "integer"
												],
												"playerID" => [
														"type" => "integer"
												],
												"publicType" => [
														"type" => "integer"
												],
												"location" => [
														"type" => "geo_point",
														"geohash" => true,
														"lat_lon" => true,
														"geohash_precision" => '1km',
														"geohash_prefix" => true,
														"validate" => false,
														"validate_lon" => false,
														"validate_lat" => false,
														"precision_step" => 1,
														"normalize" => false,
														"normalize_lon" => false,
														"normalize_lat" => false,
														"fielddata" => [
																"format" => "compressed",
																"precision" => "1km"
														]
												]
										],
								],
								"source" => [
										"type" => "json",
										"location" => ["http://maps3.lordsandknights.com/v2/LKWorldServer-US-8/dumps/habitats.json.gz"],
								],
								"transformers" => [],
						],
				],
			/* lnk 9 */

				[
						"frequency" => [],
						"dateFormat" => 'Y-m-d',
						"timezone" => 'CST',
						"versionThreshold" => 500,
						"definition" => [
								"index" => "lnk9",
								"type" => "alliances",
								"number_shards" => "1",
								"number_replica" => "1",
								"mappings" => [
										'_source' => [
												'enabled' => true
										],
										'_timestamp' => [
												'store' => true,
												'index' => 'analyzed',
												'enabled' => true
										],
										'properties' => [
												"id" => [
														"type" => "integer"
												],
												"name" => [
														"type" => "string"
												],
												"rankAverage" => [
														"type" => "integer"
												],
												"rank" => [
														"type" => "integer"
												],
												"points" => [
														"type" => "integer"
												],
												"pointsAverage" => [
														"type" => "integer"
												],
												"description" => [
														"type" => "string"
												]
										],
								],
								"source" => [
										"type" => "json",
										"location" => ["http://maps2.lordsandknights.com/v2/LKWorldServer-US-9/dumps/alliances.json.gz"],
								],
								"transformers" => [],
						],
				],
				[
						"frequency" => [],
						"dateFormat" => 'Y-m-d',
						"timezone" => 'CST',
						"versionThreshold" => 500,
						"definition" => [
								"index" => "lnk9",
								"type" => "players",
								"number_shards" => "1",
								"number_replica" => "1",
								"mappings" => [
										'_source' => [
												'enabled' => true
										],
										'_timestamp' => [
												'store' => true,
												'index' => 'analyzed',
												'enabled' => true
										],
										'properties' => [
												"id" => [
														"type" => "integer"
												],
												"nick" => [
														"type" => "string"
												],
												"points" => [
														"type" => "integer"
												],
												"rank" => [
														"type" => "integer"
												],
												"underAttackProtection" => [
														"type" => "boolean"
												],
												"onVacation" => [
														"type" => "boolean"
												]
										],
								],
								"source" => [
										"type" => "json",
										"location" => ["http://maps2.lordsandknights.com/v2/LKWorldServer-US-9/dumps/players.json.gz"],
								],
								"transformers" => [],
						],
				],
				[
						"frequency" => [],
						"dateFormat" => 'Y-m-d',
						"timezone" => 'CST',
						"versionThreshold" => 500,
						"definition" => [
								"index" => "lnk9",
								"type" => "habitats",
								"number_shards" => "1",
								"number_replica" => "1",
								"mappings" => [
										'_source' => [
												'enabled' => true
										],
										'_timestamp' => [
												'store' => true,
												'index' => 'analyzed',
												'enabled' => true
										],
										"transform" => [
												"lang" => "groovy",
												"script" => "ctx._source['location']=[ctx._source['mapX'],ctx._source['mapY']]"
										],
										'properties' => [
												"id" => [
														"type" => "integer"
												],
												"name" => [
														"type" => "string"
												],
												"mapX" => [
														"type" => "integer"
												],
												"mapY" => [
														"type" => "integer"
												],
												"points" => [
														"type" => "integer"
												],
												"creationDate" => [
														"type" => "integer"
												],
												"playerID" => [
														"type" => "integer"
												],
												"publicType" => [
														"type" => "integer"
												],
												"location" => [
														"type" => "geo_point",
														"geohash" => true,
														"lat_lon" => true,
														"geohash_precision" => '1km',
														"geohash_prefix" => true,
														"validate" => false,
														"validate_lon" => false,
														"validate_lat" => false,
														"precision_step" => 1,
														"normalize" => false,
														"normalize_lon" => false,
														"normalize_lat" => false,
														"fielddata" => [
																"format" => "compressed",
																"precision" => "1km"
														]
												]
										],
								],
								"source" => [
										"type" => "json",
										"location" => ["http://maps2.lordsandknights.com/v2/LKWorldServer-US-9/dumps/habitats.json.gz"],
								],
								"transformers" => [],
						],
				],
		],
];
