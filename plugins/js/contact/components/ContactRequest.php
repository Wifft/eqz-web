<?php
namespace JS\Contact\Components;

use Illuminate\Mail\Message;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

use October\Rain\Exception\ValidationException;

use October\Rain\Support\Facades\Flash;

use Cms\Classes\ComponentBase;

use JS\Contact\Models\Request as RequestModel;

use JS\Core\Classes\ReCaptcha;

use JS\Core\Exceptions\CustomValidationException;

use Psr\Log\LogLevel;

use Exception;
use Validator;

class ContactRequest extends ComponentBase
{
    public function componentDetails() : array
    {
        return [
            'name'        => 'Contact Component',
            'description' => 'Component that renders and handles Contact Request Form.'
        ];
    }

    public function onSubmitContactForm() : void
    {
        try {
            $data = post();
            $rules = (new RequestModel)->rules;

            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                throw new ValidationException($validator);
            } elseif (!isset($data['policy'])) {
                throw new CustomValidationException(Lang::get('js.contact::lang.messages.unaccepted_policy'));
            }

            if (ReCaptcha::checkResponse($data['g-recaptcha-response']) === true) {
                RequestModel::create($data);

                if (!env('APP_DEBUG')) {
                    Mail::send(
                        'js.contact::mail_template',
                        $data,
                        function (Message $message) use ($data) : void {
                            $message->from(env('MAIL_FROM_ADDRESS', env('MAIL_FROM_NAME')));
                            $message->to(env('MAIL_FROM_ADDRESS', env('MAIL_FROM_NAME')));
                            $message->subject('Formulario de contacto WEB');
                            $message->replyTo($data['email'], $data['name']);
                        }
                    );
                }

                Flash::success(Lang::get('js.contact::lang.messages.form_successful'));

                return;
            }

            throw new CustomValidationException(Lang::get('js.contact::lang.messages.invalid_captcha'));
        } catch (CustomValidationException | ValidationException $e) {
            Flash::error($e->getMessage());
        } catch (Exception $e) {
            trace_log($e->getMessage(), LogLevel::ERROR);

            Flash::error(Lang::get('js.contact::lang.messages.form_unsuccessful'));
        }
    }
}
