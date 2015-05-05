<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $fillable = [
      'title',
      'body',
      'published_at',
      'user_id' // temporary!!
    ];

    /**
     * Additional fields to treat as Carbon instances.
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * Scope queries to articles that have benn published.
     *
     * @param $query
     */
    public function scopePublished($query)
    {
       $query->where('published_at', '<=', Carbon::now()); 
    }

    /**
     * Scope queries to articles that have benn unpublished.
     *
     * @param $query
     */
    public function scopeUnpublished($query)
    {
      $query->where('published_at', '>', Carbon::now());
    }

    // convention is setFieldnameAttribute
    /**
     * Set the published_at attribute.
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
      $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
    * An article is owned by a user.
    *
    * @return \Illumnate\Datebase\Eloquent\Relations\BelongsTo
    */

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
