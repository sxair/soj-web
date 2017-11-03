<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // if use model-factories while faster
        // but I'm lazy to create model

        DB::table('oj_problems')->insert([
            'name' => 'sair',
            'email' => '80976512@qq.com',
            'password' => bcrypt('123123'),
            'locked' => 1,
            'control' => 1,
        ]);


        $content = <<<EOF
<h3 id="problem-description">Problem Description</h3>
<p>Calculate a + b.</p>
<h3 id="input">Input</h3>
<p>The input will consist of a series of pairs of integers a and b,separated by a space, one pair of integers per line.</p>
<h3 id="output">Output</h3>
<p>For each pair of input integers a and b you should output the sum of a and b in one line,and with one line of output for each line in input.</p>
<h3 id="sample-input">Sample Input</h3>
<p>1 5<br>2 3</p>
<h3 id="sample-output">Sample Output</h3>
<p>6<br>5</p>
<h3 id="hints">Hints</h3>
<p>C++ code for a+b:</p>
<pre><code><span class="hljs-meta">#<span class="hljs-meta-keyword">include</span> <span class="hljs-meta-string">&lt;iostream&gt;</span></span>
<span class="hljs-keyword">using</span> <span class="hljs-keyword">namespace</span> <span class="hljs-built_in">std</span>;
<span class="hljs-function"><span class="hljs-keyword">int</span> <span class="hljs-title">main</span><span class="hljs-params">()</span>
</span>{
        <span class="hljs-keyword">int</span> a,b;
  <span class="hljs-keyword">while</span> (<span class="hljs-built_in">cin</span>&gt;&gt;a&gt;&gt;b) <span class="hljs-built_in">cout</span>&lt;&lt;a+b&lt;&lt;<span class="hljs-built_in">endl</span>;
  <span class="hljs-keyword">return</span> <span class="hljs-number">0</span>;
}
</code></pre><p>Java code for a+b:</p>
<pre><code>import java.util.Scanner;

<span class="hljs-keyword">public</span> <span class="hljs-keyword">class</span> <span class="hljs-title">Main</span>
{
    <span class="hljs-function"><span class="hljs-keyword">public</span> <span class="hljs-keyword">static</span> <span class="hljs-keyword">void</span> <span class="hljs-title">main</span>(<span class="hljs-params">String[] args</span>)
    </span>{
    Scanner scan=<span class="hljs-keyword">new</span> Scanner(System.<span class="hljs-keyword">in</span> 

);
        <span class="hljs-keyword">while</span>(scan.hasNextInt())
    {
            <span class="hljs-keyword">int</span> a=scan.nextInt();
            <span class="hljs-keyword">int</span> b=scan.nextInt();
            System.<span class="hljs-keyword">out</span>.println(a+b);
        }
    }
}
</code></pre>
EOF;

        for($i=0;$i<100;$i++) {
            DB::table('oj_problems')->insert([
                'problem_id' => $i+1,
                'title' => str_random(10),
            ]);
            DB::table('oj_status')->insert([

            ]);
            DB::table('admin_problems')->insert([
                'problem_id' => $i+1,
                'title' => str_random(10),
                'user_name' => 'admin',
                'public' => rand(0, 1),
                'show' =>rand(0, 1)
            ]);
            DB::table('problems')->insert([
                'title' => str_random(10),
                'time_limit' => 1000,
                'memory_limit' => 123123,
                'judge_cnt' => 1,
                'spj' => 0,
                'content' => $content,
                'author' => str_random(10),
                'source' => str_random(10),
            ]);
        }
    }
}