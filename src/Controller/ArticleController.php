<?php

namespace App\Controller;

use App\Services\DiceRoller;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(name: 'article_')]
class ArticleController extends AbstractController
{
    public function __construct(protected DiceRoller $diceRoller)
    {
    }

    // Page d'accueil du blog, pour afficher les articles
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $articles = [
            [
                'title' => 'Un super article',
                'createdAt' => new DateTime(),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec mattis risus. Integer mollis dignissim lorem. Mauris tellus felis, mollis hendrerit nulla nec, ultrices blandit turpis. Quisque pharetra sapien lorem, sit amet tristique magna eleifend nec. Mauris libero eros, vestibulum et vulputate non, hendrerit nec mi. Phasellus euismod risus vitae erat eleifend, nec gravida nunc tempus. Mauris vehicula lacus sit amet mi hendrerit tempor. Mauris placerat posuere molestie. Fusce eget ipsum vitae dui rhoncus venenatis et et enim. In ac ultrices lectus. Nunc varius rutrum risus, viverra efficitur eros dignissim id. Vestibulum ornare augue id urna vestibulum accumsan. Mauris eget libero id nunc molestie pulvinar. In est eros, ullamcorper et turpis non, volutpat laoreet turpis. Integer tristique aliquet diam, rutrum consequat ipsum sagittis eu. '
            ],
            [
                'title' => 'Un autre article',
                'createdAt' => new DateTime('-14 days'),
                'content' => 'Sed suscipit, felis at tincidunt interdum, mauris urna finibus erat, quis placerat eros erat vitae sapien. Fusce eu leo non arcu blandit semper. Nunc cursus ante at tellus mollis, at pellentesque eros rutrum. Nunc turpis tellus, posuere vel nibh in, imperdiet volutpat nibh. In congue ultricies commodo. Cras massa eros, facilisis eget mi in, pretium blandit nunc. Nulla facilisi. Vivamus eget ullamcorper sem, at vulputate enim. Mauris auctor nisl ut dui tempor, sed condimentum metus accumsan. Fusce ut sapien lectus. Pellentesque egestas molestie convallis. Sed nec arcu at purus ultricies faucibus. Aenean ut lectus suscipit, rhoncus neque sit amet, congue sapien. Curabitur gravida, dui eu consectetur pellentesque, nibh neque blandit tellus, at tincidunt justo mauris sed augue. '
            ],
            [
                'title' => 'Un vieil article',
                'createdAt' => new DateTime('-3 months'),
                'content' => 'Curabitur scelerisque turpis sed quam fermentum, quis rhoncus nisi fermentum. Proin at mi leo. Sed sed luctus mauris, vel hendrerit massa. Ut scelerisque nunc ut fermentum sollicitudin. Nulla ultricies faucibus ipsum, non iaculis sem fermentum id. Aenean gravida arcu at arcu porttitor efficitur. Vestibulum eu sem ut nulla sollicitudin auctor. Pellentesque rhoncus nulla non nisl aliquet, eget aliquet nulla eleifend. Nullam blandit mollis orci, eu gravida libero congue sed. Sed nec elit maximus, malesuada sem a, euismod dolor. Quisque dapibus eu orci a faucibus. Sed mattis blandit quam non varius. Proin dui lorem, tempor sit amet nunc vitae, varius pulvinar purus. Nam varius lectus et ex blandit tincidunt. Quisque venenatis mollis viverra. Aenean arcu lectus, ultrices ac erat vitae, tincidunt interdum orci. '
            ],
        ];
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    // Afficher un article qu'on récupère par son slug
    #[Route('/article/{slug}', name: 'show')]
    public function show(string $slug): Response
    {
        return $this->render('article/show.html.twig', [
            'slug' => $slug,
        ]);
    }
}
