<?php


namespace App\Models;


use App\Requests\AccountRequest;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
 */
class User extends Model
{
    public $timestamps = false;
    protected $table = 'user';
    protected $fillable = ['name', 'password', 'email', 'fio'];

    /**
     * @param AccountRequest $request
     * Выполняет регистрацию пользователя
     */
    public function signUp(AccountRequest $request)
    {
        $this->login = $request->login;
        $this->password = password_hash($request->password, PASSWORD_DEFAULT);
        $this->email = $request->email;
        $this->fio = $request->fio;

        $this->save();

        $_SESSION['id'] = $this->id;
        $_SESSION['login'] = $this->login;
    }

    /**
     * @param AccountRequest $request
     * Изменяет данные учтеной записи
     */
    public function updateAccount(AccountRequest $request)
    {
        $this->login = $request->login;
        if (strlen($request->password) !== 0) {
            $this->password = password_hash($request->password, PASSWORD_DEFAULT);
        }
        $this->email = $request->email;
        $this->fio = $request->fio;

        $this->save();

        $_SESSION['login'] = $this->login;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'user_id');
    }
}