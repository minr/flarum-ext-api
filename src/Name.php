<?php
namespace Minr\Auth\Qizue;

use Flarum\Database\AbstractModel;
use Flarum\Database\ScopeVisibilityTrait;
use Flarum\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SaveAvatar
 * @property string name
 * @property string uid
 *
 * @package Minr\Auth\Qizue
 */
class Name extends AbstractModel{
    use ScopeVisibilityTrait;

    protected $table = 'username_requests';

    /**
     * {@inheritdoc}
     */
    protected $dates = ['created_at'];

    /**
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
