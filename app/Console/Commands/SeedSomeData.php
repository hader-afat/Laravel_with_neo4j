<?php

namespace App\Console\Commands;

use GraphAware\Bolt\Protocol\V1\Session;
use Illuminate\Console\Command;

class SeedSomeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seedssomedata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Session $client)
    {
        // $client = ;
        // $n = 'user_1';
        // $j = "user_2";

        // $cypher = "CREATE (n:PERSON {name: '$n'})
        // CREATE (j:PERSON {name: '$j'})
        // CREATE((n)-[:FRIEND_OF]->(j))";

        $cypher = "CREATE (ZuzanaK:Person {name:'Zuzana K.'})
        CREATE (ZsMom:Person {name:'Z Mom'})
        CREATE (ZsMom)-[:PARENT_OF]->(ZuzanaK)";
            $cypher = "CREATE (Adam:Person {name:'Adam'})
        CREATE (Eve:Person {name:'Eve'})
        CREATE (Eve)-[:MARRIED_TO]->(Adam)
        CREATE (Cain:Person {name:'Cain'})
        CREATE (Abel:Person {name:'Abel'})
        CREATE (Cain)-[:CHILD_OF]->(Adam)
        CREATE (Cain)-[:CHILD_OF]->(Eve)
        CREATE (Abel)-[:CHILD_OF]->(Adam)
        CREATE (Abel)-[:CHILD_OF]->(Eve)";

        $client->run($cypher);

        $result = $client->run("MATCH (p:Person) RETURN p");
        // dd($result->getRecords());
        // a result always contains a collection (array) of Record objects

        foreach ($result->getRecords() as $record) {
            // dd($record->get('p'));
            // dd($record->get('p')->value('name'));
            echo sprintf('Person name is : %s', $record->get('p')->value('name')) . "\n"; ;
        }
    }
}
