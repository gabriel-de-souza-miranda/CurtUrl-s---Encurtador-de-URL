<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public  $usuarios = [
		'nome' =>[
			'rules' => 'required|min_length[3]|max_length[50]|string',
			'errors' => [
				'required' => "O campo  \"Nome\" deve ser informado.",
				//'is_unique' => "Já existe outro usuario cadastrado com este email.",
				'min_length' => "O campo  \"Nome\" deve ter no minimo 3 caracteres.",
				'max_length' => "O campo  \"Nome\" deve ter no maximo 50 caracteres.",
				'string' => "O campo  \"Nome\" deve ter apenas texto.",

			]
		],

		'email' => [
			'rules' => 'required|valid_email|is_unique[usuarios.email]',
			'errors' => [
				'required' => "O campo  \"Email\" deve ser informado.",
				'valid_email' => "Email Invalido.",
				'is_unique' => "Email existente."
			]

		],

		'Senha' => [
			'rules' => 'required|min_length[8]',
			'errors' => [
				'required' => "A  \"Senha\" deve ser informada.",
				'min_length' => "A \"Senha\" deve ter no minimo 8 caracteres."
			]
		],
		
		'senhacon' => [
			'rules' => 'matches[Senha]',
			'errors' => [
				'matches' => "A \"Senha de Confirmação\" deve ser igual a Senha.",
			]
		],



	];


	
}
