<?php
 
class PostCommentSeeder extends Seeder {
 
    public function run()
    {
        $content = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Maecenas molestie dolor eu massa semper, vitae lobortis magna elementum. 
        Vestibulum luctus urna tellus, id pretium tellus consequat blandit. 
        Etiam in vehicula ex. Quisque vestibulum non mi in sagittis. Proin commodo leo ac pellentesque bibendum. 
        Nulla convallis euismod arcu vel malesuada. Aliquam ornare lacinia nunc, a facilisis massa scelerisque et. 
        Integer scelerisque iaculis eros id scelerisque. Nullam eget mattis arcu. 
        Integer viverra sed est id tristique. Morbi bibendum rhoncus nisi id convallis. 
        Suspendisse aliquam sem eu mollis venenatis. Suspendisse sed ultrices est. 
        Nam porta purus sapien, molestie dapibus purus dignissim in. 
        Quisque efficitur congue efficitur.</p>

        <p>Proin pharetra porta lobortis. Praesent est sem, luctus eu ante ut, facilisis consequat ante. 
        Nunc dolor ligula, interdum ac justo laoreet, porttitor sodales sapien. Ut vitae fringilla libero. 
        Praesent rhoncus lorem a rhoncus molestie. Praesent lorem augue, luctus sed dictum eget, ultrices quis ex. 
        Curabitur sagittis viverra magna non porttitor. Aliquam ultrices tempor bibendum. 
        Pellentesque egestas risus vitae ultrices accumsan.</p>

        <p>Integer orci neque, efficitur quis condimentum non, luctus in nisi. Suspendisse potenti. 
        Morbi feugiat ac odio ac vestibulum. Quisque ornare, orci quis suscipit tempor, dui neque rhoncus velit, ut pharetra nisi dui id tellus. 
        Aenean lacinia ornare sem, nec auctor nunc congue quis. 
        Vestibulum suscipit ex vitae nulla semper, a tristique tortor commodo. Maecenas luctus varius tellus eu condimentum. 
        Proin rutrum bibendum urna, sit amet feugiat nibh sodales ut. 
        Nulla luctus tellus quis eros mollis, sagittis vulputate mauris mollis. Sed lobortis maximus efficitur. 
        Suspendisse tristique non purus et posuere. Sed eleifend orci non ligula maximus, ut tristique dui feugiat. 
        In at ullamcorper tortor, sed convallis magna.</p>

        <p>Integer accumsan, mauris non consequat molestie, purus sapien venenatis ipsum, nec cursus lorem lorem a libero. 
        Curabitur efficitur eu ante a consequat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
        Morbi volutpat mauris sit amet ipsum vulputate cursus. Sed vitae elit at enim vehicula rhoncus eu non neque. 
        Vestibulum condimentum ante eget nulla dictum placerat. Proin congue felis ligula, at laoreet ligula maximus vitae. 
        Vestibulum diam quam, posuere sed lectus a, rhoncus maximus elit. Nullam porta enim sit amet rutrum euismod. 
        Ut eu velit a turpis cursus ultricies. Aenean eleifend libero id purus suscipit, sit amet malesuada turpis luctus. 
        Quisque luctus rhoncus urna ac sagittis. Nullam mollis urna non felis suscipit, sit amet maximus sapien auctor. 
        Sed non risus eu elit sodales blandit. In elementum tincidunt risus, id dictum dolor laoreet id. 
        Sed eget commodo mi, molestie gravida velit.</p>

        <p>Nam volutpat elit quis sagittis ultricies. Vivamus in fermentum arcu, at lobortis velit. 
        Cras faucibus eros in ipsum feugiat, id ornare velit consectetur. Fusce molestie interdum ipsum accumsan gravida. 
        Sed at pellentesque elit, pulvinar ultrices enim. 
        Duis aliquam pretium lorem, sed dictum nunc finibus id. Nunc porttitor, lorem quis semper aliquam, nulla orci ullamcorper mauris, 
        ac laoreet enim velit sit amet augue. Maecenas quis lacus faucibus, tincidunt erat et, mollis ligula. 
        Curabitur ut tortor sed felis facilisis consectetur non eget turpis. Sed scelerisque elit odio, et efficitur leo imperdiet id. 
        Etiam a eros accumsan, scelerisque orci sed, lobortis est. Ut suscipit turpis a sagittis rutrum. Suspendisse potenti. 
        Suspendisse in fermentum mi. Curabitur sit amet egestas eros.</p>';

        for( $i = 1 ; $i <= 10 ; $i++ )
        {
            $post = new Post;
            $post->title = "Post no $i";
            $post->category_id = $i;
            $post->content = $content;
            $post->save();
 
            $maxComments = mt_rand(3,15);
            for( $j = 1 ; $j <= $maxComments; $j++)
            {
                $comment = new Comment;
                $comment->commenter = 'xyz';
                $comment->comment = substr($content, 0, 120);
                $comment->email = 'xyz@xmail.com';
                $comment->approved = 1;
                $post->comments()->save($comment);
                $post->increment('comment_count');
            }   
        }
    }
}