<?php

namespace Siakad;

use Siakad\Language;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Response
{
	public static function show($data, $code = null, $formed = false)
	{
		if(!$formed)
			$data = isset($data) ? ['data' => $data] : null;

		$data = self::addDebug($data);

		return $code ? response()->json($data, $code) : $data;
	}

	public static function error($code, $exception)
	{
		$error = ['code' => $code, 'message' => null];
		$message = $exception->getMessage();

		if ($exception instanceof HttpException) {
			// cek json
			if ($datamsg = json_decode($message, true))
				$error = array_merge($error, $datamsg);
			else
				$error['message'] = $message;
		} else {
			$files = [];
			do {
				$files[] = $exception->getFile() . ' baris ' . $exception->getLine();
			} while ($exception = $exception->getPrevious());

			$error['debug'] = [
				'message' => $message,
				'files' => $files
			];
		}

		// terjemahkan pesan error
		$error['message'] = Language::getErrorMessage($code, $error['message'] ?? null);

		$data = self::addDebug(['error' => $error]);

		return response()->json($data, $code);
	}

	public static function addDebug($data)
	{
		if (self::isDebug()) {
			if ($debug = app('request')->request->get('debug'))
				$data['debug'] = $debug;
		} else if (!empty($data['error']['debug']))
			unset($data['error']['debug']);

		return $data;
	}

	public static function isDebug()
	{
		return env('APP_DEBUG');
	}
}
