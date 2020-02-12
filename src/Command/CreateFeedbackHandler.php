<?php
namespace Minr\Auth\Qizue\Command;

use Flarum\User\AssertPermissionTrait;
use Minr\Auth\Qizue\Feedback;
use Minr\Auth\Qizue\FeedbackValidator;

class CreateFeedbackHandler{
    use AssertPermissionTrait;

    /**
     * @var FeedbackValidator
     */
    protected $validator;

    /**
     * @param FeedbackValidator $validator
     */
    public function __construct(FeedbackValidator $validator) {
        $this->validator = $validator;
    }

    /**
     * @param CreateFeedback $command
     * @return Feedback
     * @throws \Illuminate\Validation\ValidationException
     */
    public function handle(CreateFeedback $command){
        $actor      = $command->actor;
        $data       = $command->data;
        $ipAddress  = $command->ipAddress;
        $version    = $command->version;
        $platform   = $command->platform;

        $feedback   = Feedback::build(
            $actor->id,
            array_get($data, 'content', ''),
            $ipAddress, $version, $platform,
            time(),
        );

        $this->validator->assertValid($feedback->getAttributes());
        $feedback->save();

        return $feedback;
    }
}
