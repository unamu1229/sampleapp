<?php

namespace App\Http\Controllers\Review;

use App\DataProvider\RegisterReviewProviderInterface;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Log;
use function response;

/**
 * Class RegisterAction
 */
class RegisterAction extends Controller
{
    /** @var RegisterReviewProviderInterface */
    private $provider;

    /**
     * RegisterAction constructor.
     *
     * @param RegisterReviewProviderInterface $provider
     */
    public function __construct(
        RegisterReviewProviderInterface $provider
    ) {
        $this->provider = $provider;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {

        Log::debug(print_r($request->all(), true));
        $this->provider->registerReview(
            $request->get('title'),
            $request->get('content'),
            $request->get('user_id', 1),
            Carbon::now()->toDateTimeString(),
            $request->get('tags')
        );
        return response('jj', Response::HTTP_OK);
    }
}
